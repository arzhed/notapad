<template>
  <div class="note notes-format" :class="classColor">
      <editable :id="id" :content="content" :bid="bid" @update="update"></editable>
      <div class="bottom-note">
          <button class="bottom-button" @click="deleteNote"> &#9760; </button>
          <button class="bottom-button" @click="openedColors = !openedColors"> &#119964; </button>
          <div class="colors" v-show="openedColors">
              <div class="color"> <button @click="colorChange('blue')" class="note-blue"> &emsp; </button> </div>
              <div class="color"> <button @click="colorChange('red')" class="note-red"> &emsp; </button> </div>
              <div class="color"> <button @click="colorChange('orange')" class="note-orange"> &emsp; </button> </div>
              <div class="color"> <button @click="colorChange('pink')" class="note-pink"> &emsp; </button> </div>
          </div>
      </div>
  </div>
</template>

<script>
import Editable from './Editable'

export default {
  name: 'note',
  components: { Editable },
  props: ['content', 'id', 'bid', 'rkey', 'color'],
  // mounted() {
    // this.$el.innerText = this.content;
  // },
  computed : {
    classColor () {
        return 'note-' + this.color
    }
  },
  data () {
    return {
        openedColors :false,
    }
  },
  methods : {
    update:function(event){
      this.$emit('update', event);
    },
    colorChange (color) {
        var vm = this;
        this.$emit('updcolor', {
            color: color,
            id: this.id,
            bid: this.bid
        });
    },
    deleteNote () {
      var vm = this;
      if (confirm('Are you sure you want to delete this note ?')) {
          this.axios.delete('/note/'+this.id+'?bid=' + this.bid).then(function(res) {
              vm.$emit('deletednote', vm.rkey);
          });
      }
    }
  }
}
</script>
