import { describe, it, expect } from 'vitest'
import { cariMahasiswa, hitungPerProdi } from '../mahasiswa'

const data = [
  { nim: '24/1/SV/1', nama: 'Budi', prodi: 'TRPL' },
  { nim: '24/2/SV/2', nama: 'Siti Aminah', prodi: 'TRPL' },
  { nim: '24/3/SV/3', nama: 'Andi', prodi: 'SI' },
]

describe('cariMahasiswa', () => {
  it('mencari berdasarkan nama (tanpa peduli huruf besar)', () => {
    expect(cariMahasiswa(data, 'siti')).toEqual([data[1]])
  })
  it('mengembalikan semua data jika kata kosong', () => {
    expect(cariMahasiswa(data, '  ')).toHaveLength(3)
  })
})

describe('hitungPerProdi', () => {
  it('menghitung jumlah mahasiswa tiap prodi', () => {
    expect(hitungPerProdi(data)).toEqual({ TRPL: 2, SI: 1 })
  })
})
