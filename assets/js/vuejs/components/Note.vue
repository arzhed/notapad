<template>
  <div class="note notes-format">
      <editable :id="id" :content="content" :bid="bid" @update="update"></editable>
  </div>
</template>

<script>
import Editable from './Editable'

export default {
  name: 'note',
  components: { Editable },
  props: ['content', 'id', 'bid'],
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
    }
  }
}
</script>
