<template>
  <div class="card shadow mt-3">
    <div class="card-body">
      <h5 class="card-title" style="color: blue">Edit kontraks</h5>
      <form class="row g-3" @submit.prevent="update">
        <!-- <div class="col-md-6">
          <label for="inputEmail4" class="form-label">id</label>
          <input
            type="number"
            class="form-control"
            id="inputEmail4"
            v-model="kontrakss.id"
          />
          <div class="alert alert-danger" v-if="validation.id">
            {{ validation.id[0] }}
          </div>
        </div> -->
        <div class="col-md-12">
          <label for="inputPassword4" class="form-label">Mahasiswa Id</label>
          <input
            type="text"
            class="form-control"
            id="inputPassword4"
            v-model="kontraks.mahasiswa_id"
          />
          <div class="alert alert-danger" v-if="validation.mahasiswa_id">
            {{ validation.mahasiswa_id[0] }}
          </div>
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Semester Id</label>
          <input
            type="text"
            class="form-control"
            id="inputAddress"
            v-model="kontraks.semester_id"
          />
          <div class="alert alert-danger" v-if="validation.semester_id">
            {{ validation.semester_id[0] }}
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
    const kontraks = reactive({
      id: "",
      mahasiswa_id: "",
      semester_id: "",
    });
    const validation = ref([]);
    const router = useRouter();
    const route = useRoute();
    console.log("ini id ", route.params.id);
    onMounted(() => {
      axios
        .get(`http://127.0.0.1:8000/api/kontraks-only/${route.params.id}`)
        .then((response) => {
          console.log(response.data.data);
          kontraks.id = response.data.data[0].id;
          kontraks.mahasiswa_id = response.data.data[0].mahasiswa_id;
          kontraks.semester_id = response.data.data[0].semester_id;
        })
        .catch((error) => {
          console.log(error.response.data);
        });
    });
    function update() {
      let id = kontraks.id;
      let mahasiswa_id = kontraks.mahasiswa_id;
      let semester_id = kontraks.semester_id;

      axios
        .put(`http://127.0.0.1:8000/api/kontraks/update/${id}`, {
          id: id,
          mahasiswa_id: mahasiswa_id,
          semester_id: semester_id,
        })
        .then(() => {
          router.push({
            name: "Indexkontraks",
          });
        })
        .catch((error) => {
          console.log(error);
        });
    }
    return {
      kontraks,
      validation,
      router,
      update,
      route,
    };
  },
};
</script>
