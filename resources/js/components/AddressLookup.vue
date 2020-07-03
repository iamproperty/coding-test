<template>
  <div class="container">
    <div class="row">
      <div class="col mb-3">
        <label class="sr-only" for="postcode-lookup">Postcode</label>
        <Postcode
          @postcode="loadAddresses"
          id="postcode-lookup"
          class="form-control"
          aria-placeholder="Postcode"
          placeholder="Postcode"
        />
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div role="alert" class="alert alert-danger" v-show="error" v-text="error"/>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label class="sr-only" id="address-lookup-label">
          Select Address
        </label>
        <ul
          id="address-lookup-list"
          v-show="addresses.length > 0 && show"
          class="list-group"
          role="listbox"
          aria-labelledby="address-lookup-label"
          :aria-activedescendant="`address-lookup-list-item-${selectedIndex}`"
        >
          <li
            v-for="({line_1}, index) in addresses"
            :id="`address-lookup-list-item-${index}`"
            class="list-group-item cursor-pointer"
            @click="select(index)"
            role="option"
            :aria-selected="index === selectedIndex ? 'true' : 'false'"
            v-text="line_1"
          />
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
  import Postcode from './Postcode'

  export default {
    name: 'AddressLookup',
    data: function () {
      return {
        addresses: [],
        show: false,
        selectedIndex: null,
        error: null
      }
    },
    methods: {
      async loadAddresses(postcode) {
        try {
          this.error = null;
          const response = await fetch(
            'https://addresses.iamproperty.com/postcodes/' + postcode + '/addresses'
          );
          this.show = true;
          const {result} = await response.json();
          if (this.addresses.length === 0) {
            this.error = 'Unable to find address';
          } else {
            this.addresses = result;
          }
        } catch {
          this.error = 'Unable to load addresses.';
          this.addresses = [
            {
              line_1: '123 My Street',
            }, {
              line_1: '125 My Street',
            }, {
              line_1: '127 My Street',
            }, {
              line_1: '129 My Street',
            }, {
              line_1: '131 My Street',
            }
          ];
        }

      },
      select(v) {
        this.selectedIndex = v;
        this.show = false
        this.$emit('select', this.addresses[v]);
      }
    },
    components: {
      Postcode
    }
  }
</script>

<style scoped>
  .list-group-item:hover {
    background-color: #ffffbb;
  }
</style>
