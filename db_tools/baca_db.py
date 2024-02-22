import pymysql

koneksi = pymysql.connect(
    host='localhost',
    user='root',
    password='',
    db='gis',
    charset='utf8mb4',
    cursorclass=pymysql.cursors.DictCursor
)

# Membaca isi table tb_poi

try:
	with koneksi.cursor() as cursor:
		qry = "SELECT * FROM tb_poi"
		cursor.execute(qry)

		hasil_qry = cursor.fetchall()

		for baris in hasil_qry:
			print(f"--------------------------------------------------------\n")
			print(baris)

finally:
	koneksi.close()