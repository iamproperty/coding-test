<template>
  <div>
    <AddressLookup @select="select" ref="addressLookup"/>

    <pre v-if="selected">
      <button type="button" class="close" aria-label="Close" @click="close">
        <span aria-hidden="true">&times;</span>
      </button>
      <code>{{ selected | json }}</code>
    </pre>
  </div>
</template>

<script>
import AddressLookup from './components/AddressLookup'

export default {
  name: 'AddressApp',
  data: function () {
    return {
      selected: null
    }
  },
  methods: {
    select(v) {
      this.selected = v
    },
    close() {
      this.selected = null
      this.$refs.addressLookup.show = true;
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
