<template>
  <div>
    <AddressLookup @select="select"/>

    <pre v-if="selected">
      <code>
      <li v-if="value !== ''" v-for="(value, index) in selected" :key="index" class="list-group-item list-group-item-action list-group-item-secondary"><strong>{{index}}</strong> {{ value }}</li>
      </code>
      </pre>
  </div>
</template>

<script>
import AddressLookup from './components/AddressLookup'

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
    AddressLookup
  }
}
</script>
