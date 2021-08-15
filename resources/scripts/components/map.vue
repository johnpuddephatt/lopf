<template>
  <div class="relative flex flex-col overflow-hidden border-t lg:flex-row">
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
          v-for="group in groups"
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
      <a
        :ref="`${group.slug}-sidebar`"
        :href="group.link"
        :key="group.slug"
        class="block px-4 py-8 hover:bg-sky-light"
        :class="{ 'bg-sky-light': selected == group.slug }"
        v-for="group in groups"
      >
        <h3 class="font-bold">{{ group.title.rendered }}</h3>
        <div class="text-xs" v-html="group.address.address"></div>
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
      groups: [],
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
