<template>
  <div class="card shadow mt-3">
    <div class="card-body">
      <h5 class="card-title" style="color: blue">Add jadwal</h5>
      <form class="row g-3" @submit.prevent="store">
        <!-- <div class="col-md-6">
      <label for="inputEmail4" class="form-label">id</label>
      <input type="number" class="form-control" id="inputEmail4" 
      v-model="jadwals.id" />
      <div class="alert alert-danger" v-if="validation.id">
        {{ validation.id[0] }}
      </div>
    </div> -->
        <div class="col-md-12">
          <label for="inputPassword4" class="form-label">Jadwal</label>
          <input
            type="text"
            class="form-control"
            id="inputPassword4"
            v-model="jadwals.jadwal"
          />
          <div class="alert alert-danger" v-if="validation.jadwal">
            {{ validation.jadwal[0] }}
          </div>
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Matakuliah Id</label>
          <input
            type="text"
            class="form-control"
            id="inputAddress"
            v-model="jadwals.matakuliah_id"
          />
          <div class="alert alert-danger" v-if="validation.matakuliah_id">
            {{ validation.matakuliah_id[0] }}
          </div>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
import { reactive, ref } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";
export default {
  setup() {
    const jadwals = reactive({
      id: "",
      jadwal: "",
      matakuliah_id: "",
    });
    const validation = ref([]);
    const router = useRouter();
    function store() {
      let id = jadwals.id;
      let jadwal = jadwals.jadwal;
      let matakuliah_id = jadwals.matakuliah_id;
      axios
        .post("http://127.0.0.1:8000/api/jadwals/create", {
          id: id,
          jadwal: jadwal,
          matakuliah_id: matakuliah_id,
        })
        .then(() => {
          router.push({
            name: "Index",
          });
        })
        .catch((error) => {
          console.log(error);
        });
    }
    return {
      jadwals,
      validation,
      router,
      store,
    };
  },
};
</script>