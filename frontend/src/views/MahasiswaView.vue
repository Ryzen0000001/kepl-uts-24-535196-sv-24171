<script setup>
import { ref, computed, onMounted } from 'vue'
import { cariMahasiswa } from '../utils/mahasiswa'

const daftar = ref([])
const kata = ref('')
const error = ref('')
const hasil = computed(() => cariMahasiswa(daftar.value, kata.value))

onMounted(async () => {
  try {
    const res = await fetch(`${import.meta.env.VITE_API_URL}/mahasiswa`)
    if (!res.ok) throw new Error(`HTTP ${res.status}`)
    daftar.value = await res.json()
  } catch {
    error.value = 'Tidak dapat terhubung ke server Laravel. Pastikan php artisan serve berjalan.'
  }
})
</script>

<template>
  <h1>Data Mahasiswa</h1>
  <p v-if="error" style="color: red">{{ error }}</p>
  <template v-else>
    <input v-model="kata" placeholder="Cari nama / NIM">
    <table border="1" cellpadding="6">
      <thead><tr><th>NIM</th><th>Nama</th><th>Prodi</th></tr></thead>
      <tbody>
        <tr v-for="m in hasil" :key="m.id">
          <td>{{ m.nim }}</td><td>{{ m.nama }}</td><td>{{ m.prodi }}</td>
        </tr>
      </tbody>
    </table>
  </template>
</template>
