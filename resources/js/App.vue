<template>
  <div>
    <register></register>

    <pre v-if="selected"><code>{{ selected | json }}</code></pre>
  </div>
</template>

<script>
import AddressLookup from './components/AddressLookup'
import Register from "./components/Register";

export default {
  name: 'App',
  data: function () {
    return {
      selected: null
    }
  },
  methods: {
    select(v) {
      this.selected = v
    }
  },
  filters: {
    json: v => JSON.stringify(v, null, 4)
  },
  components: {
    Register,
    AddressLookup
  }
}
</script>
