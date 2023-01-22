<template>
  <div>
    <div class="container max-w-5xl my-4">
      <button
        class="px-4 mr-2 text-xl leading-loose rounded-full"
        :class="view == 'map' ? 'bg-blue text-white' : 'bg-sky-light'"
        @click="view = 'map'"
      >
        Map view
      </button>
      <button
        class="px-4 text-xl leading-loose rounded-full"
        :class="
          view == 'list' ? 'bg-blue text-white' : 'bg-sky-light hover:bg-sky'
        "
        @click="view = 'list'"
      >
        List view
      </button>
    </div>
    <div
      v-if="view == 'map'"
      class="relative flex flex-col overflow-hidden border-t lg:flex-row"
    >
      <div class="relative flex-1 map-container">
        <l-map
          ref="myMap"
          :zoom="zoom"
          :center="center"
          :options="{ attributionControl: false }"
        >
          <l-control-attribution position="bottomleft"></l-control-attribution>
          <l-tile-layer :url="url" :attribution="attribution" />
          <l-marker
            :icon="group.neighbourhood_network ? orangeIcon : blueIcon"
            :ref="`${group.slug}-marker`"
            v-for="group in filteredList"
            :key="group.slug"
            @click="scrollTo(group.slug)"
            :lat-lng="[group.address.lat, group.address.lng]"
          >
          </l-marker>
        </l-map>
      </div>
      <div
        class="top-0 bottom-0 right-0 overflow-y-auto shadow-2xl lg:absolute lg:w-1/3 lg:max-w-sm bg-sky-lightest map-sidebar bg-opacity-90"
      >
        <div class="bg-blue-lightest">
          <div class="flex flex-row bg-blue-lightest">
            <button
              @click="filterTab = 'name'"
              class="px-4 py-3"
              :class="{ 'bg-blue-light text-white': filterTab == 'name' }"
            >
              Filter by name
            </button>
            <button
              @click="filterTab = 'postcode'"
              class="px-4 py-3"
              :class="{ 'bg-blue-light text-white': filterTab == 'postcode' }"
            >
              Search by postcode
            </button>
          </div>
          <div
            v-if="filterTab == 'name'"
            class="flex flex-row items-center gap-2 px-3 py-3 bg-blue-light"
          >
            <input
              class="w-full px-3 py-2 leading-tight text-gray-700 border rounded-full shadow appearance-none focus:outline-none focus:shadow-outline"
              type="text"
              aria-label="Filter results by name"
              v-model="search"
              placeholder="Search by name.."
            />
            <button class="text-white" @click="search = null">Clear</button>
          </div>
          <div
            v-if="filterTab == 'postcode'"
            class="flex flex-row items-center gap-2 px-3 py-3 bg-blue-light"
          >
            <input
              class="w-full px-3 py-2 leading-tight text-gray-700 border rounded-full shadow appearance-none focus:outline-none focus:shadow-outline"
              type="text"
              aria-label="Filter results by name"
              v-model="postcode"
              placeholder="Enter postcode and press enter"
              @keyup.enter="convertPostcodeToLatLng"
            />
            <button
              v-if="!latLng"
              class="text-white"
              @click="convertPostcodeToLatLng"
            >
              Search
            </button>
            <button
              v-if="latLng"
              class="text-white"
              @click="latLng = postcode = null"
            >
              Clear
            </button>
          </div>
        </div>

        <a
          :ref="`${group.slug}-sidebar`"
          target="_blank"
          :href="group.url"
          :key="group.slug"
          class="block px-4 py-4 border-b border-blue-lightest hover:bg-sky-light"
          :class="{
            'bg-sky-light ml-0 border-l-8 border-blue': selected == group.slug,
          }"
          v-for="group in filteredList"
        >
          <h3
            class="text-lg font-bold leading-tight"
            v-html="group.title.rendered"
          ></h3>
          <p class="text-sm truncate">
            {{ group.address.address }}
          </p>
          <p
            class="text-sm mt-1 inline-block px-3 mr-1 rounded-full bg-sky text-blue"
            v-if="group.area_covered"
          >
            {{ group.area_covered }}
          </p>
        </a>

        <div class="p-4 rounded" v-if="!filteredList.length">
          No businesses to show you.
        </div>
      </div>
    </div>

    <!-- List view -->
    <div v-else class="container max-w-5xl my-12">
      <div
        class="flex flex-col gap-8 px-8 py-4 mb-6 lg:flex-row bg-blue-lightest"
      >
        <div class="flex flex-row items-center flex-grow gap-2">
          <label for="list-search">Search:</label>
          <input
            id="list-search"
            class="w-full max-w-lg px-3 py-3 leading-tight text-gray-700 border rounded-full shadow appearance-none focus:outline-none focus:shadow-outline"
            type="text"
            v-model="search"
            placeholder="Search by name.."
          />
        </div>
      </div>
      <a
        target="_blank"
        :ref="`${group.slug}-sidebar`"
        :href="group.url"
        :key="group.slug"
        class="block py-8"
        v-for="group in filteredList"
      >
        <h3 class="text-xl font-bold">
          <span v-html="group.title.rendered"></span>
        </h3>
        <p class="text-sm truncate">
          <span
            class="inline-block px-3 mr-1 rounded-full bg-sky text-blue"
            v-if="group.area_covered"
            >{{ group.area_covered }}</span
          >
          {{ group.address.address }}
        </p>
      </a>
    </div>
  </div>
</template>

<script>
import 'leaflet/dist/leaflet.css';

import L from 'leaflet';
import {
  LMap,
  LTileLayer,
  LMarker,
  LIconDefault,
  LControlAttribution,
} from 'vue2-leaflet';
import { latLng } from 'leaflet';

export default {
  name: 'groupMap',
  components: {
    LControlAttribution,
    LIconDefault,
    LMap,
    LTileLayer,
    LMarker,
  },
  data() {
    return {
      filterTab: 'name',
      latLng: null,
      postcode: null,
      view: 'map',
      groups: [],
      search: null,
      selected: null,
      imagePath: null,
      zoom: 12,
      center: latLng(53.7993475, -1.5032696),
      blueIcon: L.icon({
        iconUrl: `${window.directory_uri.stylesheet_directory_uri}/public/images/leaflet/marker-icon.png`,
        iconRetinaUrl: `${window.directory_uri.stylesheet_directory_uri}/public/images/leaflet/marker-icon-2x.png`,
        iconSize: [25, 41],
        iconAnchor: [13, 41],
      }),
      orangeIcon: L.icon({
        iconUrl: `${window.directory_uri.stylesheet_directory_uri}/public/images/leaflet/marker-icon-orange.png`,
        iconRetinaUrl: `${window.directory_uri.stylesheet_directory_uri}/public/images/leaflet/marker-icon-orange-2x.png`,
        iconSize: [25, 41],
        iconAnchor: [13, 41],
      }),
      url:
        'https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png',
      attribution:
        '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
    };
  },
  watch: {
    latLng: function() {
      if (this.latLng && this.latLng.length) {
        this.$refs.myMap.mapObject.flyTo(
          latLng(this.latLng[0], this.latLng[1]),
          14
        );
      } else {
        this.$refs.myMap.mapObject.flyTo(this.center, this.zoom);
      }
      // zoom/pan map.
      // if null, reset map zoom/pan
    },
  },
  computed: {
    filteredList() {
      if (!this.groups) {
        return null;
      }

      let groupsWithAddress = this.groups.filter(group => {
        return group.address;
      });

      if (this.filterTab == 'name' && this.search) {
        return groupsWithAddress.filter(group => {
          return (
            group.title.rendered
              .toLowerCase()
              .includes(this.search.toLowerCase()) ||
            group.address.address
              .toLowerCase()
              .includes(this.search.toLowerCase())
          );
        });
      } else if (this.filterTab == 'postcode' && this.postcode) {
        return groupsWithAddress
          .map(entry => {
            if (entry.latitude && entry.longitude) {
              entry.distance = this.distanceFromUserLatLng(entry);
            } else {
              entry.distance == null;
            }
            return entry;
          })
          .sort((a, b) => {
            return a.distance - b.distance;
          });
      } else {
        return groupsWithAddress;
      }
    },
  },
  mounted() {
    this.imagePath = `${window.directory_uri.stylesheet_directory_uri}/public/images/leaflet/`;
    let groups = fetch(
      `/wp-json/wp/v2/business?orderby=title&per_page=100&order=asc&come_in_and_rest=1`
    )
      .then(response => response.json())
      .then(data => (this.groups = data));
  },
  methods: {
    scrollTo(slug) {
      this.selected = slug;
      this.$refs[`${slug}-sidebar`][0].scrollIntoView({
        behavior: 'smooth',
        block: 'center',
        inline: 'nearest',
      });
    },
    convertPostcodeToLatLng: function() {
      fetch(`//api.postcodes.io/postcodes/${this.postcode.split(' ').join('')}`)
        .then(response => response.json())
        .then(data => {
          if (data.status == 200) {
            this.latLng = [data.result.latitude, data.result.longitude];
            this.error = null;
            this.postcode = this.postcode.toUpperCase();
          } else {
            this.error = data.error;
          }
        });
    },
    distanceFromUserLatLng: function(entry) {
      let distance = this.distance(
        entry.address.lat,
        entry.address.lng,
        this.latLng[0],
        this.latLng[1]
      );
      return Math.round(distance * 10) / 10;
    },
    distance(lat1, lon1, lat2, lon2) {
      if (lat1 == lat2 && lon1 == lon2) {
        return 0;
      } else {
        var radlat1 = (Math.PI * lat1) / 180;
        var radlat2 = (Math.PI * lat2) / 180;
        var theta = lon1 - lon2;
        var radtheta = (Math.PI * theta) / 180;
        var dist =
          Math.sin(radlat1) * Math.sin(radlat2) +
          Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
        if (dist > 1) {
          dist = 1;
        }
        dist = Math.acos(dist);
        dist = (dist * 180) / Math.PI;
        dist = dist * 60 * 1.1515;
        // dist = dist * 1.609344;
        return dist;
      }
    },
    clearPostcode: function() {
      this.latLng = [];
      this.postcode = null;
    },
  },
};
</script>

<style lang="scss" scoped>
.map-container {
  padding-top: 56.25%;
  @media (orientation: portrait) {
    padding-top: 100vw;
  }
}

.map-sidebar {
  z-index: 999;
}

.vue2leaflet-map {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
}
</style>
