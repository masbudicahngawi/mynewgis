import pymysql

koneksi = pymysql.connect(
    host='localhost',
    user='root',
    password='',
    db='gis',
    charset='utf8mb4',
    cursorclass=pymysql.cursors.DictCursor
)

# Menuliskan data ke table

try:
	with koneksi.cursor() as cursor:
		qry = "INSERT INTO pemains (nama, posisi, klub, created_at, updated_at) VALUES ('Maradona', 'Penyerang', 'FC Barcelona', NOW(), NOW())"
		cursor.execute(qry)

	koneksi.commit()

	print("Data berhasil disimpan")

finally:
	koneksi.close()