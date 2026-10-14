export function cariMahasiswa(daftar, kata) {
  const k = kata.trim().toLowerCase()
  if (!k) return daftar
  return daftar.filter((m) => m.nama.toLowerCase().includes(k) || m.nim.includes(k))
}

export function hitungPerProdi(daftar) {
  return daftar.reduce((hasil, m) => {
    hasil[m.prodi] = (hasil[m.prodi] || 0) + 1
    return hasil
  }, {})
}
