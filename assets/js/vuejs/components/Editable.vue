<template>
  <div class="note-content" contenteditable="true" @input="update" @focus="focus" @blur="blur">
  </div>
</template>

<script>
export default {
  name: 'editable',
  props: ['content', 'id', 'bid'],
  mounted() {
    this.$el.innerText = this.content;
  },
  data () {
    return {

    }
  },
  methods : {
    update:function(event){
      this.$emit('update', event.target.innerText);
    },
    focus () {
      console.log('focus')
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
