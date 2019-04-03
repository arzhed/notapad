<template>
  <div :id="htmlId" class="note-content" contenteditable="true" @input="update" @blur="blur" @keyup.enter="forceBlur">
  </div>
</template>

<script>
export default {
  name: 'editable',
  props: ['content', 'id', 'bid'],
  mounted() {
    this.$el.innerText = this.content;
  },
  computed : {
    htmlId () {
        return 'note-content-'+this.id;
    }
  },
  data () {
    return {

    }
  },
  methods : {
    update:function(event){
      this.$emit('update', event.target.innerText);
    },
    forceBlur (event) {
        document.querySelector('#' + this.htmlId).blur()
        event.preventDefault()
        event.stopPropagation()
    },
    blur () {
      this.axios.put('/note/'+this.id, {
          'bid': this.bid,
          'description' : this.content
      }).then(function(res) {
         console.log('put', res)
      });
    }
  }
}
</script>
