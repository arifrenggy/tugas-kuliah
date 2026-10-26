# Tugas Citra Digital - Augmentasi Foto Selfie
# Nama : Kurniawan Arif Renggi
# NIM  : 2123036

import cv2
import numpy as np
import os

# baca foto selfie
foto = cv2.imread('selfie.jpg')
h, w = foto.shape[:2]

# titik tengah wajah (dari deteksi wajah Haarcascade)
cx, cy = 296, 280

# jarak aman dari titik tengah wajah ke tepi foto terdekat
r = min(cx, cy, w - cx, h - cy)

# sisi kotak crop dihitung agar diagonalnya masih di dalam
# area gambar asli, jadi hasil rotasi tidak menyisakan bagian hitam
sisi = int(r * 1.4)

# siapkan folder output
os.makedirs('hasil', exist_ok=True)

# 100 sudut rotasi merata dari 5 sampai 355 derajat
sudut = np.linspace(5, 355, 100)

for i, derajat in enumerate(sudut, start=1):
    # buat matriks rotasi dengan titik tengah di wajah
    M = cv2.getRotationMatrix2D((cx, cy), derajat, 1.0)
    putar = cv2.warpAffine(foto, M, (w, h))

    # scale: ambil bagian di sekitar wajah supaya bagian hitam hilang
    x1 = cx - sisi // 2
    y1 = cy - sisi // 2
    crop = putar[y1:y1 + sisi, x1:x1 + sisi]

    # ubah ukuran ke 200 x 200 pixel lalu simpan
    hasil = cv2.resize(crop, (200, 200))
    cv2.imwrite('hasil/selfie_%03d.jpg' % i, hasil)

print('Selesai! 100 foto tersimpan di folder hasil')
