<template>
  <div id="app-vue">
      <div class="notes">
        <note v-for="(note) in notes" v-bind:key="note.id" v-bind:id="note.id" :retrieved-content="note.description" ></note>
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
        }
    }
}
</script>
