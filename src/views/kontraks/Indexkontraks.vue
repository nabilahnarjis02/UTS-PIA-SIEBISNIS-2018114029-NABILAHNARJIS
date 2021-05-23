<template>
  <div class="home">
    <!-- <Slider /> -->
    <hr class="my-3" />
    <router-link class="btn btn-primary" to="/createkontraks"
      >Add kontrak</router-link
    >
    <table class="table tble-striped">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Mahasiswa Id</th>
          <th scope="col">Semester Id</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(kontrak, index) in kontraks" :key="index">
          <td>{{ kontrak.id }}</td>
          <td>{{ kontrak.mahasiswa_id }}</td>
          <td>{{ kontrak.semesters_id }}</td>

          <td>
            <router-link
              class="btn btn-success"
              :to="{ name: 'Editkontrak', params: { id: kontrak.id } }"
              >Edit</router-link
            >
            <button
              @click.prevent="kontraksDelete(kontrak.id)"
              class="btn btn-danger"
            >
              delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";
// @ is an alias to /src
import { onMounted, ref } from "vue";
export default {
  setup() {
    let kontraks = ref([]);
    onMounted(() => {
      axios
        .get("http://127.0.0.1:8000/api/kontraks")
        .then((response) => {
          console.log(response.data.data);
          kontraks.value = response.data.data;
        })
        .catch((error) => {
          console.log(error);
        });
    });
    function kontraksDelete(id) {
      axios
        .delete(`http://127.0.0.1:8000/api/kontraks/delete/${id}`)
        .then(() => {
          let z = this.kontraks
            .map((kontraks) => kontraks.id)
            .indexOf(id);
          this.kontraks.splice(z, 1);
        })
        .catch((error) => {
          console.log(error);
        });
    }
    return {
      kontraks,
      kontraksDelete,
    };
  },
};
</script>
