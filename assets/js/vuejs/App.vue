<template>
  <div id="app-vue">
      <div class="notes">
        <note v-for="(note, key) in notes" v-bind:key="key" :rkey="key" v-bind:id="note.id" :content="note.description" :bid="note.bid" @update="note.description = $event" :color="note.color" @updcolor="updateNoteColor($event, key)" @deletednote="deletedNote"></note>
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
    mounted () {
        const urlParams = new URLSearchParams(window.location.search);
        var vm = this;
        this.axios.get('/note?bid=' + urlParams.get('bid')).then(function(res) {
            vm.notes = vm.notes.concat(res.data);
        });
    },
    data () {
        return {
            notes: []
        }
    },
    methods: {
        createNote () {
            const urlParams = new URLSearchParams(window.location.search);
            var vm = this;
            this.axios.post('/note', {'bid' : urlParams.get('bid')}).then(function(res) {
                vm.notes.push(res.data)
            })
        },
        deletedNote(key) {
            this.notes.splice(key, 1);
        },
        updateNoteColor(evt, key) {
            var vm = this;
            this.axios.put('/note/'+evt.id, {
                'bid'   : evt.bid,
                'color' : evt.color
            }).then(function(res) {
                vm.notes.splice(key, 1, res.data);
            });
        }
    }
}
</script>
