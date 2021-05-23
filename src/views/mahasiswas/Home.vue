<template>
  <div class="home">
    <div class="container">
      <Slider />
      <hr class="my-3" />
      <router-link class="btn btn-primary" to="/createmahasiswas"
        >Add mahasiswa</router-link
      >
      <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nama mahasiswa</th>
            <th scope="col">Alamat</th>
            <th scope="col">No tlp</th>
            <th scope="col">Email</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(mahasiswas, index) in mahasiswas" :key="index">
            <td>{{ mahasiswas.id }}</td>
            <td>{{ mahasiswas.nama_mahasiswa }}</td>
            <td>{{ mahasiswas.alamat }}</td>
            <td>{{ mahasiswas.no_tlp }}</td>
            <td>{{ mahasiswas.email }}</td>
            <td>
              <router-link
                class="btn btn-success"
                :to="{ name: 'Editmahasiswa', params: { id: mahasiswas.id } }"
                >Edit</router-link
              >
              <button
                @click.prevent="mahasiswasDelete(mahasiswas.id)"
                class="btn btn-danger"
              >
                delete
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import axios from "axios";
// @ is an alias to /src
import Slider from "../../components/Slider.vue";
import { onMounted, ref } from "vue";

export default {
  name: "Home",
  components: {
    Slider,
  },
  setup() {
    let mahasiswas = ref([]);
    onMounted(() => {
      axios
        .get("http://127.0.0.1:8000/api/mahasiswas")
        .then((response) => {
          console.log(response.data.data);
          mahasiswas.value = response.data.data;
        })
        .catch((error) => {
          console.log(error);
        });
    });
    function mahasiswasDelete(id) {
      axios
        .delete(`http://127.0.0.1:8000/api/mahasiswas/delete/${id}`)
        .then(() => {
          let z = this.mahasiswas
            .map((mahasiswas) => mahasiswas.id)
            .indexOf(id);
          this.mahasiswas.splice(z, 1);
        })
        .catch((error) => {
          console.log(error);
        });
    }
    return {
      mahasiswas,
      mahasiswasDelete,
    };
  },
};
</script>