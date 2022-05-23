const regex = new RegExp('^([A-Z][A-HK-Y]?[0-9][A-Z0-9]? ?[0-9][A-Z]{2})$', 'i')
const upperCase = (value) => {
  try {
    return value.toUpperCase()
  } catch (e) {
    return ''
  }
}

export default {
  name: 'Postcode',
  functional: true,
  props: {
    value: {
      type: String,
      default: ''
    }
  },
  render (h, { data, props, listeners }) {
    const noop = (() => {})
    let input, postcode
    ({ input = noop, postcode = noop, ...listeners } = listeners)

    const context = {
      ...data,
      attrs: {
        ...data.attrs,
        type: 'text',
        value: upperCase(props.value),
      },
      class: [
        'form-control',
        data.class,
        data.staticClass,
      ],
      on: {
        ...listeners,
        input ({ target }) {
          const value = upperCase(target.value)
          target.value = value
          input(upperCase(value))

          if (regex.test(value)) {
            postcode(value)
          }
        },
      }
    }

    return h('input', context)
  }
}
