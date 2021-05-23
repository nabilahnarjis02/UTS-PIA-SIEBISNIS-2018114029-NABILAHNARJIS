<template>
  <div class="card shadow mt-3">
    <div class="card-body">
      <h5 class="card-title" style="color: blue">Edit mahasiswa</h5>
      <form class="row g-3" @submit.prevent="update">
        <!-- <div class="col-md-6">
          <label for="inputEmail4" class="form-label">id</label>
          <input
            type="number"
            class="form-control"
            id="inputEmail4"
            v-model="mahasiswas.id"
          />
          <div class="alert alert-danger" v-if="validation.id">
            {{ validation.id[0] }}
          </div>
        </div> -->
        <div class="col-md-12">
          <label for="inputPassword4" class="form-label">Nama mahasiswa</label>
          <input
            type="text"
            class="form-control"
            id="inputPassword4"
            v-model="mahasiswas.nama_mahasiswa"
          />
          <div class="alert alert-danger" v-if="validation.nama_mahasiswa">
            {{ validation.nama_mahasiswa[0] }}
          </div>
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Alamat</label>
          <input
            type="text"
            class="form-control"
            id="inputAddress"
            placeholder="Masukan alamat"
            v-model="mahasiswas.alamat"
          />
          <div class="alert alert-danger" v-if="validation.alamat">
            {{ validation.alamat[0] }}
          </div>
        </div>
        <div class="col-12">
          <label for="inputAddress2" class="form-label">No tlp</label>
          <input
            type="number"
            class="form-control"
            id="inputAddress2"
            placeholder="Masukan No tlp"
            v-model="mahasiswas.no_tlp"
          />
          <div class="alert alert-danger" v-if="validation.no_tlp">
            {{ validation.no_tlp[0] }}
          </div>
        </div>
        <div class="col-md-12">
          <label for="inputCity" class="form-label">Email</label>
          <input
            type="text"
            class="form-control"
            id="inputCity"
            v-model="mahasiswas.email"
          />
          <div class="alert alert-danger" v-if="validation.email">
            {{ validation.email[0] }}
          </div>
        </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
import { onMounted, reactive, ref } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";
import { useRoute } from "vue-router";
export default {
  setup() {
    const mahasiswas = reactive({
      id: "",
      nama_mahasiswa: "",
      alamat: "",
      no_tlp: "",
      email: "",
    });
    const validation = ref([]);
    const router = useRouter();
    const route = useRoute();
    console.log("ini id", route.params.id);
    onMounted(() => {
      axios
        .get(`http://127.0.0.1:8000/api/mahasiswa-only/${route.params.id}`)
        .then((response) => {
          console.log("aishaisiaos", response.data.data);
          mahasiswas.id = response.data.data[0].id;
          mahasiswas.nama_mahasiswa = response.data.data[0].nama_mahasiswa;
          mahasiswas.alamat = response.data.data[0].alamat;
          mahasiswas.no_tlp = response.data.data[0].no_tlp;
          mahasiswas.email = response.data.data[0].email;
        })
        .catch((error) => {
          console.log(error.response.data);
        });
    });
    function update() {
      let id = mahasiswas.id;
      let nama_mahasiswa = mahasiswas.nama_mahasiswa;
      let alamat = mahasiswas.alamat;
      let no_tlp = mahasiswas.no_tlp;
      let email = mahasiswas.email;
      axios
        .put(`http://127.0.0.1:8000/api/mahasiswas/update/${id}`, {
          id: id,
          nama_mahasiswa: nama_mahasiswa,
          alamat: alamat,
          no_tlp: no_tlp,
          email: email,
        })
        .then(() => {
          // console.log("asasasssasa");
          router.push({
            name: "Home",
          });
        })
        .catch((error) => {
          console.log(error);
        });
    }
    return {
      mahasiswas,
      validation,
      router,
      update,
      route,
    };
  },
};
</script>


