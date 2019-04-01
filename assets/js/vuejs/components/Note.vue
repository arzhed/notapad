<template>
  <div class="note notes-format">
      <editable :id="id" :content="content" :bid="bid" @update="update"></editable>
      <button @click="deleteNote"> &#9760; </button>
  </div>
</template>

<script>
import Editable from './Editable'

export default {
  name: 'note',
  components: { Editable },
  props: ['content', 'id', 'bid', 'rkey'],
  // mounted() {
    // this.$el.innerText = this.content;
  // },
  data () {
    return {

    }
  },
  methods : {
    update:function(event){
      this.content = event;
      this.$emit('update', event);
    },
    deleteNote () {
      var vm = this;
      this.axios.delete('/note/'+this.id+'?bid=' + this.bid).then(function(res) {
        vm.$emit('deletednote', vm.rkey);
      });
    }
  }
}
</script>
