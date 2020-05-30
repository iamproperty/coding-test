<template>
  <div>
    <AddressLookup @select="select"/>
    <div class="container">
      <br>
      <div v-if="sel" style="width: 70%">
        <table class="table table-bordered" style="margin-left:23%;">
          <tr>
            <th class="text-center" colspan="2">{{selected.postcode}}</th>
          </tr>
          <tr class="selected" v-for="(value, key) in selected" v-if="value !== ''">
            <td>{{key | Modify }}</td>
            <td>{{value}}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
  import AddressLookup from './components/AddressLookup'

  export default {
    name: 'App',
    data: function () {
      return {
        selected: null,
        sel: false
      }
    },
    methods: {
      select(v) {
        this.selected = v
        this.sel = true
      },
    },
    filters: {
      Modify(value) {
        value = value.charAt(0).toUpperCase()+ value.slice(1);
        value = value.replace("_", " ");
        return value;
      }
    },
    components: {
      AddressLookup
    }
  }
</script>
