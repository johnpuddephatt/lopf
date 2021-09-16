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
        :class="view == 'list' ? 'bg-blue text-white' : 'bg-sky-light'"
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
          <l-icon-default :image-path="imagePath"></l-icon-default>
          <l-tile-layer :url="url" :attribution="attribution" />
          <l-marker
            :ref="`${group.slug}-marker`"
            v-for="group in filteredGroups"
            :key="group.slug"
            @click="scrollTo(group.slug)"
            :lat-lng="[group.address.lat, group.address.lng]"
          >
          </l-marker>
        </l-map>
      </div>
      <div
        class="absolute top-0 bottom-0 right-0 w-1/4 max-w-sm overflow-y-auto divide-y shadow-2xl bg-sky-lightest map-sidebar bg-opacity-90"
      >
        <div class="mx-4 my-3">
          <input
            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded-full shadow appearance-none focus:outline-none focus:shadow-outline"
            type="text"
            v-model="search"
            placeholder="Search by name.."
          />
        </div>

        <a
          :ref="`${group.slug}-sidebar`"
          :href="group.link"
          :key="group.slug"
          class="block px-4 py-6 hover:bg-sky-light"
          :class="{ 'bg-sky-light': selected == group.slug }"
          v-for="group in filteredList"
        >
          <p
            v-if="group.neighbourhood_network"
            class="inline-block px-2 pt-0.5 -ml-0.5 mb-1 text-xs font-normal rounded-md bg-blue-lightest"
          >
            Neighbourhood network
          </p>
          <h3 class="font-bold">{{ group.title.rendered }}</h3>

          <div
            class="text-xs"
            v-if="group.address"
            v-html="group.address.address"
          ></div>
        </a>

        <div class="p-4 rounded" v-if="!filteredList.length">
          No groups to show you.
        </div>
      </div>
    </div>
    <div v-else class="container max-w-5xl my-4">
      <a
        :ref="`${group.slug}-sidebar`"
        :href="group.link"
        :key="group.slug"
        class="block py-8"
        :class="{ 'bg-sky-light': selected == group.slug }"
        v-for="group in groups"
      >
        <h3 class="text-xl font-bold">
          {{ group.title.rendered }}
          <p
            v-if="group.neighbourhood_network"
            class="inline-block px-2 pt-0.5 ml-3 text-base font-normal rounded-lg bg-blue-lightest"
          >
            Neighbourhood network
          </p>
        </h3>

        <div class="text" v-html="group.address.address"></div>
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
  props: ['type'],
  components: {
    LControlAttribution,
    LIconDefault,
    LMap,
    LTileLayer,
    LMarker,
  },
  data() {
    return {
      view: 'map',
      groups: [],
      search: null,
      selected: null,
      imagePath: null,
      zoom: 12,
      center: latLng(53.7993475, -1.5032696),
      url:
        'https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png',
      attribution:
        '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
    };
  },
  computed: {
    filteredList() {
      let groupsWithAddress = this.groups.filter(group => {
        return group.address;
      });
      if (!this.search) {
        return groupsWithAddress;
      } else {
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
      }
    },
  },
  mounted() {
    this.imagePath = `${window.directory_uri.stylesheet_directory_uri}/public/images/leaflet/`;
    let cinemas = fetch(`/wp-json/wp/v2/${this.type}`)
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
  },
};
</script>

<style lang="scss" scoped>
.map-container {
  padding-top: 56.25%;
  @media (orientation: portrait) {
    padding-top: 50vw;
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
