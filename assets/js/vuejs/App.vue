<template>
  <div id="app-vue">
      <div class="notes">
        <note v-for="(note, id) in notes" v-bind:key="id" retrieved-content="aaa"></note>
        <div id="newnote" class="note notes-format" @click="createNote">
          <div class="note-content">+</div>
        </div>
      </div>

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
