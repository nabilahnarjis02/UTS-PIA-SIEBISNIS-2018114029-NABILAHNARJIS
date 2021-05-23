import { createRouter, createWebHashHistory } from 'vue-router'

import Home from '../views/mahasiswas/Home.vue'
import Createmahasiswas from '../views/mahasiswas/Createmahasiswas.vue'
import Editmahasiswas from '../views/mahasiswas/Editmahasiswas.vue'

import Index from '../views/matakuliahs/Index.vue'
import Creatematakuliahs from '../views/matakuliahs/Creatematakuliahs.vue'
import Editmatakuliahs from '../views/matakuliahs/Editmatakuliahs.vue'

import Indexabsensis from '../views/absensis/Indexabsensis.vue'
import Createabsensis from '../views/absensis/Createabsensis.vue'
import Editabsensis from '../views/absensis/Editabsensis.vue'

import Indexkontraks from '../views/kontraks/Indexkontraks.vue'
import Createkontraks from '../views/kontraks/Createkontraks.vue'
import Editkontraks from '../views/kontraks/Editkontraks.vue'

import Indexjadwals from '../views/jadwals/Indexjadwals.vue'
import Createjadwals from '../views/jadwals/Createjadwals.vue'
import Editjadwals from '../views/jadwals/Editjadwals.vue'

import Indexsemesters from '../views/semesters/Indexsemesters.vue'
import Createsemesters from '../views/semesters/Createsemesters.vue'
import Editsemesters from '../views/semesters/Editsemesters.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/createmahasiswas',
    name: 'Createmahasiswa',
    component: Createmahasiswas
  },
  {
    path: '/editmahasiswas/:id',
    name: 'Editmahasiswa',
    component: Editmahasiswas
  },
  {
    path: '/matakuliahs',
    name: 'Index',
    component: Index
  },
  {
    path: '/creatematakuliahs',
    name: 'Creatematakuliah',
    component: Creatematakuliahs
  },
  {
    path: '/editmatakuliahs/:id',
    name: 'Editmatakuliah',
    component: Editmatakuliahs
  },
  {
    path: '/absensis',
    name: 'Indexabsensis',
    component: Indexabsensis
  },
  {
    path: '/createabsensis',
    name: 'Createabsensi',
    component: Createabsensis
  },
  {
    path: '/editabsensis/:id',
    name: 'Editabsensi',
    component: Editabsensis
  },
  {
    path: '/kontraks',
    name: 'Indexkontraks',
    component: Indexkontraks
  },
  {
    path: '/createkontraks',
    name: 'Createkontrak',
    component: Createkontraks
  },
  {
    path: '/editkontraks/:id',
    name: 'Editkontrak',
    component: Editkontraks
  },
  {
    path: '/jadwals',
    name: 'Indexjadwals',
    component: Indexjadwals
  },
  {
    path: '/createjadwals',
    name: 'Createjadwal',
    component: Createjadwals
  },
  {
    path: '/editjadwals/:id',
    name: 'Editjadwal',
    component: Editjadwals
  },
  {
    path: '/semesters',
    name: 'Indexsemesters',
    component: Indexsemesters
  },
  {
    path: '/createsemesters',
    name: 'Createsemester',
    component: Createsemesters
  },
  {
    path: '/editsemesters/:id',
    name: 'Editsemester',
    component: Editsemesters
  },
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router