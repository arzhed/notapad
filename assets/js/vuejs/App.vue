<template>
  <div id="app-vue">
      <div class="notes">
        <note v-for="(note, id) in notes" v-bind:key="id"></note>
      </div>
      <div id="newnote" class="notes-format" @click="createNote">+</div>

  </div>
</template>

<script>
import Note from './components/Note'

export default {
    name: 'app',
    components: {
        Note
    },
    data () {
        return {
            notes: []
        }
    },
    methods: {
        createNote () {
            this.notes.push({})
        }
    }
}
</script>
