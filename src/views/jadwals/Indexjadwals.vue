<template>
  <div class="home">
    <!-- <Slider /> -->
    <hr class="my-3" />
    <router-link class="btn btn-primary" to="/createjadwals"
      >Add jadwal</router-link
    >
    <table class="table tble-striped">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Jadwal</th>
          <th scope="col">Matakuliah Id</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(jadwal, index) in jadwals" :key="index">
          <td>{{ jadwal.id }}</td>
          <td>{{ jadwal.jadwal }}</td>
          <td>{{ jadwal.matakuliah_id }}</td>

          <td>
            <router-link
              class="btn btn-success"
              :to="{ name: 'Editjadwal', params: { id: jadwal.id } }"
              >Edit</router-link
            >
            <button
              @click.prevent="jadwalsDelete(jadwal.id)"
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
    let jadwals = ref([]);
    onMounted(() => {
      axios
        .get("http://127.0.0.1:8000/api/jadwals")
        .then((response) => {
          console.log(response.data.data);
          jadwals.value = response.data.data;
        })
        .catch((error) => {
          console.log(error);
        });
    });
    function jadwalsDelete(id) {
      axios
        .delete(`http://127.0.0.1:8000/api/jadwals/delete/${id}`)
        .then(() => {
          let z = this.jadwals
            .map((jadwals) => jadwals.id)
            .indexOf(id);
          this.jadwals.splice(z, 1);
        })
        .catch((error) => {
          console.log(error);
        });
    }
    return {
      jadwals,
      jadwalsDelete,
    };
  },
};
</script>