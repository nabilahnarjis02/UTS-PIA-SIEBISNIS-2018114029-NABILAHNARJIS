<template>
  <div class="card shadow mt-3">
    <div class="card-body">
      <h5 class="card-title" style="color: blue">Edit absensi</h5>
      <form class="row g-3" @submit.prevent="update">
        <!-- <div class="col-md-6">
          <label for="inputEmail4" class="form-label">id</label>
          <input
            type="number"
            class="form-control"
            id="inputEmail4"
            v-model="absensis.id"
          />
          <div class="alert alert-danger" v-if="validation.id">
            {{ validation.id[0] }}
          </div>
        </div> -->
        <div class="col-md-12">
          <label for="inputPassword4" class="form-label">Waktu absensi</label>
          <input
            type="text"
            class="form-control"
            id="inputPassword4"
            v-model="absensis.waktu_absensi"
          />
          <div class="alert alert-danger" v-if="validation.waktu_absensi">
            {{ validation.waktu_absensi[0] }}
          </div>
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">mahasiswa_id</label>
          <input
            type="text"
            class="form-control"
            id="inputAddress"
            v-model="absensis.mahasiswa_id"
          />
          <div class="alert alert-danger" v-if="validation.mahasiswa_id">
            {{ validation.mahasiswa_id[0] }}
          </div>
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">matakuliah_id</label>
          <input
            type="text"
            class="form-control"
            id="inputAddress"
            v-model="absensis.matakuliah_id"
          />
          <div class="alert alert-danger" v-if="validation.matakuliah_id">
            {{ validation.matakuliah_id[0] }}
          </div>
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">keterangan</label>
          <input
            type="text"
            class="form-control"
            id="inputAddress"
            v-model="absensis.keterangan"
          />
          <div class="alert alert-danger" v-if="validation.keterangan">
            {{ validation.keterangan[0] }}
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
    const absensis = reactive({
      id: "",
      waktu_absensi: "",
      mahasiswa_id: "",
      matakuliah_id: "",
      keterangan: ""
    });
    const validation = ref([]);
    const router = useRouter();
    const route = useRoute();
    console.log("ini id ", route.params.id);
    onMounted(() => {
      axios
        .get(`http://127.0.0.1:8000/api/absensi-only/${route.params.id}`)
        .then((response) => {
          console.log(response.data.data);
          absensis.id = response.data.data[0].id;
          absensis.waktu_absensi = response.data.data[0].waktu_absensi;
          absensis.mahasiswa_id = response.data.data[0].mahasiswa_id;
          absensis.matakuliah_id = response.data.data[0].matakuliah_id;
          absensis.keterangan = response.data.data[0].keterangan;
        })
        .catch((error) => {
          console.log(error.response.data);
        });
    });
    function update() {
      let id = absensis.id;
      let waktu_absensi = absensis.waktu_absensi;
      let mahasiswa_id = absensis.mahasiswa_id;
      let matakuliah_id = absensis.matakuliah_id;
      let keterangan = absensis.keterangan;
      axios
        .put(`http://127.0.0.1:8000/api/absensis/update/${id}`, {
          id: id,
          waktu_absensi: waktu_absensi,
          mahasiswa_id: mahasiswa_id,
          matakuliah_id: matakuliah_id,
          keterangan: keterangan,
        })
        .then(() => {
          router.push({
            name: "Indexabsensis",
          });
        })
        .catch((error) => {
          console.log(error);
        });
    }
    return {
      absensis,
      validation,
      router,
      update,
      route,
    };
  },
};
</script>
