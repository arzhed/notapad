<template>
  <div class="note notes-format" contenteditable="true" @input="update" @focus="focus" @blur="blur" @keydown="moveCursor">
  </div>
</template>

<script>
export default {
  name: 'note',
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
