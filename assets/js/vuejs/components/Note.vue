<template>
  <div class="note notes-format">
    <div class="note-content" contenteditable="true" @input="content = $event.target.innerText" @focus="focus" @blur="blur">
      {{ content }}
    </div>
  </div>
</template>

<script>
export default {
  name: 'note',
  props: ['retrievedContent'],
  data () {
    return {
      content: this.retrievedContent
    }
  },
  methods : {
    focus () {
      console.log('focus')
    },
    blur () {
      console.log('blur')
    }
  }
}
</script>
