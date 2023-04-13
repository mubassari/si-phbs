<?php

namespace Database\Seeders;

use App\Models\Indikator;
use Illuminate\Database\Seeder;

class IndikatorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_text = [
            ["Persalinan dilakukan oleh tenaga kesehatan", "<p>
                <p> Apa itu persalinan ditolong oleh tenaga kesehatan ? Adalah persalinan yang ditolong oleh tenaga kesehatan
                    (bidan,
                    dokter, dan tenaga para medis lainnya).Mengapa setiap persalinan harus ditolong oleh tenaga kesehatan ?</p>
                <ol>
                    <li>Tenaga kesehatan merupakan orang yang sudah ahli dalam membantu persalinanan, sehingga keselamatan Ibu dan
                        bayi
                        lebih terjamin.</li>
                    <li>Apabila terdapat kelainan dapat diketahui dan segera ditolong atau dirujuk ke Puskesmas atau rumah sakit.
                    </li>
                    <li>Persalinan yang ditolong oleh tenaga kesehatan menggunakan peralatan yang aman, bersih, dan steril sehingga
                        mencegah terjadinya infeksi dan bahaya kesehatan lainnya.</li>
                </ol>
                <p> Apa Tanda-Tanda Persalinan ?</p>
                <ol>
                    <li>Ibu mengalami mulas-mulas yang timbulnya semakin sering dan semakin kuat.</li>
                    <li>Rahim terasa kencang bila diraba, terutama pada saat mulas.</li>
                    <li>Keluar lendir bercampur darah dari jalan lahir.</li>
                    <li>Keluar cairan ketuban yang berwarna jernih kekuningan dari jalan lahir.</li>
                    <li>Merasa seperti mau buang air besar.</li>
                </ol>
                <p> Apa Tanda-Tanda Bahaya Persalinan ?</p>
                <ol>
                    <li>Bayi tidak lahir dalam 12 jam sejak terasa mulas.</li>
                    <li>Keluar darah dari jalan lahir sebelum melahirkan.</li>
                    <li>Tali pusat atau tangan/kaki bayi terlihat pada jalan lahir.</li>
                    <li>Tidak kuat mengejan .</li>
                    <li>Mengalami kejang-kejang.</li>
                    <li>Air ketuban keluar dari jalan lahir sebelum terasa mulas.</li>
                    <li>Air ketuban keruh dan berbau.</li>
                    <li>Setelah bayi lahir, ari-ari tidak keluar.</li>
                    <li>Gelisah atau mengalami kesakitan yang hebat.</li>
                    <li>Keluar darah banyak setelah bayi lahir.</li>
                    <li>Bila ada tanda bahaya, ibu harus segera dibawa ke bidan/dokter.</li>
                </ol>
            </p>"],
            ["Bayi mendapat ASI Eksekutip", ""],
            ["Bayi yang ditimbang setiap ulan", ""],
            ["Penggunaan keseharian dengan air bersih", "<p>
                <p>Air adalah salah satu elemen utama di Bumi yang menjadi bagian tidak terpisahkan bagi seluruh manusia. Makhluk hidup tidak dapat hidup jika tidak ada air, sehingga air sangat dibutuhkan untuk menjaga kelangsungan makhluk hidup. Air dalam tubuh manusia sangat berfungsi untuk mengisi cairan dalam tubuh dengan meminum air. Selain untuk penghilang rasa haus dan manfaat utama lainnya air untuk tubuh, air juga memiliki manfaat lain yang sangat dibutuhkan untuk menunjang kehidupan. Salah satu bentuk Perilaku Hidup Bersih dan Sehat atau PHBS adalah dengan menggunakan air bersih sehari-hari. Karena kualitas air dapat mempengaruhi kesehatan dan kehidupan sehari-hari. Air yang kita gunakan sehari-hari seperti minum, memasak, mandi dan lainnya harus dalam keadaan bersih sehingga kita dapat terhindar dari penyakit yang disebabkan karena kualitas air buruk. Dengan menggunakan air bersih kita dapat terhindar dari penyakit seperti diare, kolera, disentri, tipes, cacingan, penyakit kulit hingga keracunan. Untuk itu wajib bagi seluruh anggota keluarga dalam menggunakan air bersih setiap hari dan menjaga kualitas air tetap bersih di lingkungannya.</p>
                <div>
                    Berikut ada beberapa tips dalam menjaga kualitas air bersih di lingkungan.
                </div>
                <ol>
                    <li>Pisahkan jarak antara sumber air dengan jamban dan tempat pembuangan sampah minimal 10 meter</li>
                    <li>Sumber mata air harus dilindungi dari bahan pencemar</li>
                    <li>Sumur gali, sumur pompa, kran umum dan mata air harus dijaga bangunannya gar tidak rusak</li>
                    <li>Lantai sumur sebaiknya kedap air (diplester) dan tidak retak, bibir sumur dan dinding sumur harus diplester dan sumur ditutup</li>
                    <li>Ember penampung air dilengkapi denga penutup dan gayung bertangkai, dijaga kebersihannya.</li>
                    <li>Air harus dihaga kebersihannya dengan tidak ada genangan air di sekitar sumber air, dan dilengkapi dengan saluran pembuangan air, tidak ada kotoran, tidak ada lumut, pada lantai/dinding sumur.</li>
                </ol>
                <i>
                    Sumber : Manfaat Air Bersih dan Menjaga Kualitasnya (kemkes.go.id)
                </i>
            </p>"],
            ["Mencuci tangan dengan air bersih dibantu dengan sabun", "<p>
                <p>Mari biasakan diri untuk cuci tangan pakai sabun dan air mengalir….!</p>
                <p>Kenapa cuci tangan harus pakai sabun? Tangan melakukan banyak hal seperti memegang hewan peliharaan, membersihkan kotoran, menyiapkan makanan, memberi makan anak, menyusui bayi dan lain-lain, jika tidak dicuci maka dapat memindahkan kuman penyakit. Kulit tangan kita selalu lembab karena secara alami mengandung lemak. Oleh karena itu kuman/kotoran mudah menempel di tangan kita dan akan berpindah ke benda/makanan yang kita pegang. Kuman-kuman penyakit senang berada di tempat yang kotor. Cuci tangan harus pakai sabun dengan air mengalir, karena dengan memakai sabun dapat membersihkan tangan dari kotoran yang mengandung kuman penyakit. Cuci tangan pakai sabun dengan air mengalir dapat mencegah Penyakit diare, infeksi saluran pernafasan atas hingga lebih dari 50%, menurunkan 50% insiden avian influensa, hepatitis A, kecacingan, penyakit kulit dan mata.
                </p>
                <h5>5 waktu penting CTPS :</h5>
                <ul>
                    <li>Sebelum makan</li>
                    <li>Setelah BAB</li>
                    <li>Sebelum menjamah makanan</li>
                    <li>Sebelum menyusui</li>
                    <li>Setelah beraktifitas</li>
                </ul>
                <h5> 6 langkah cuci tangan yang benar yaitu :</h5>
                <ul>
                    <li>Basahi tangan, gosok sabun pada telapak tangan kemudian usap dan gosok kedua telapak tangan secara lembut
                        dengan arah memutar</li>
                    <li>Usap dan gosok juga kedua punggung tangan secara bergantian</li>
                    <li>Gosok sela-sela jari tangan hingga bersih</li>
                    <li>Bersihkan ujung jari secara bergantian dengan posisi saling mengunci</li>
                    <li>Gosok dan putar kedua ibu jari secara bergantian</li>
                    <li>Letakkan ujung jari ke telapak tangan kemudian gosok perlahan. Bilas dengan air bersih dan keringkan </li>
                </ul>
                <i>Sumber : Pentingnya Cuci Tangan Pakai Sabun Dengan Air Mengalir – RSUD SULBAR (sulbarprov.go.id)</i>
            </p>"],
            ["Menggunakan jamban yang sehat", "<p>
                <p>Jamban adalah suatu ruangan yang mempunyai fasilitas pembuangan kotoran manusia yang terdiri atas tempat jongkok atau tempat duduk dengan leher angsa atau tanpa leher angsa (cemplung) yang dilengkapi dengan unit penampungan kotoran air untuk membersihkannya. </p>
                <h5>Cara Memilih Jenis Jamban :</h5>
                <ol>
                    <li>Jamban cemplung digunakan untuk daerah yang sulit air</li>
                    <li>Jamban tangki septik/leher angsa digunakan untuk daerah yang cukup air dan daerah padat penduduk, karena
                        dapat menggunakan multiple latrine yaitu satu lubang penampungan tinja/tangki septik digunakan oleh beberapa
                        jamban (satu lubang dapat menampung kotoran/tinja dari 3-5 jamban)</li>
                    <li>Daerah pasang surut, tempat penampungan kotoran/tinja hendaknya ditinggikan kurang lebih 60 cm dari
                        permukaan air pasang. Setiap aggota rumah tangga harus menggunakan jamban untuk buang airbesar/buang air
                        kecil. </li>
                </ol>
                <h5>Tujuan Menggunakan Jamban :</h5>
                <ol>
                    <li> Menjaga lingkungan bersih, sehat dan tidak berbau</li>
                    <li> Tidak mencemari sumber air yang ada di sekitamya.</li>
                    <li> Tidak mengundang datangnya lalat atau serangga yang dapat menjadi penular penyakit Diare, Kolera Disentri,
                        Thypus, kecacingan, penyakit saluran pencernaan, penyakit kulit dan keracuanan.</li>
                </ol>
                <h5>Syarat - Syarat Jamban Sehat :</h5>
                <ul>
                    <li> Tidak mencemari sumber air minum (jarak antara sumber air minum dengan lubang penampungan minimal 10 meter
                    </li>
                    <li> Tidak berbau</li>
                    <li> Kotoran tidak dapat dijamah oleh serangga dan tikus</li>
                    <li> Tidak mencemari tanah di sekitamya</li>
                    <li> Mudah dibersihkan dan aman digunakan</li>
                    <li> Dilengkapi dinding dan atap pelindung</li>
                    <li> Penerangan dan ventilasi cukup</li>
                    <li> Lantai kedap air dan luas ruangan memadai</li>
                    <li> Tersedia air, sabun, dan alat pembersih.</li>
                </ul>
                <h5>Cara Memelihara Jamban Sehat :</h5>
                <p>
                    Lantai jamban selalu bersih dan tidak ada genangan air
                    Bersihkan jamban secara teratur sehingga ruang jamban dalam keadaan bersih
                    Di dalam jamban tidak ada kotoran yang terlihat
                    Tidak ada serangga (kecoa, lalat) dan tikur yang berkeliaran
                    Tersedia alat pembersih (sabun, sikat dan air bersih)
                    Bila ada kerusakan segera diperbaiki.
                    Pakailah karbol pada saat membersihkan lantai agar bebas penyakit.
                    Hindarkan menyiram air sabun ke dalam bak pembuangan/atau ke dalam kloset agar bakteri pembusuk tetap berperan
                    aktif.
                    Jangan menggunakan alat pembersih yang keras agar kloset tidak cepat rusak.
                    Jangan membuang kotoran yang tidak mudah larut ke dalam air misal : kertas, kain bekas, dll.
                </p>
                <i>Sumber : Jamban Sehat - Kompasiana.com</i>
            </p>"],
            ["Meberentas jentik-jentik nyamuk", "<p>
                <p> Cara mencari jentik nyamuk Telur dan jentik nyamuk berukuran sangat kecil sehingga wajar jika luput dari penglihatan Anda. Lokasi-lokasi yang tidak
                    terpikirkan oleh Anda bisa menjadi sarang karena jentik-jentik nyamuk hanya memerlukan sedikit genangan air jernih
                    untuk bertahan hidup. Lakukan pemeriksaan jentik nyamuk secara rutin agar Anda bisa segera menanganinya. Waspadai dan
                    teliti tempat-tempat tak terduga di dalam dan di sekitar rumah yang berpotensi digenangi air. Prinsip 3M–menguras,
                    mengubur, dan menutup—tetap perlu Anda jalankan sebagai upaya pencegahan yang paling efisien. Di bawah ini beberapa cara
                    untuk mendeteksi keberadaan jentik nyamuk:</p>
                <ol>
                    <li>Perhatikan permukaan genangan air jernih dengan penerangan yang baik. Jentik-jentik nyamuk akan lebih mudah terlihat ketika bergerak. Anda bisa mengusik permukaan air dengan jari atau sepotong kayu sehingga jentik-jentik berhamburan menuju dasar genangan air.</li>
                    <li>Jentik-jentik nyamuk kadang tersamar oleh endapan pasir di dasar wadah yang tergenang air hujan. Anda bisa mengetesnya dengan mengusiknya.</li>
                    <li>Jangan keliru dan saling tertukar antara jentik-jentik nyamuk dan kecebong katak karena keduanya bisa jadi tampak mirip.</li>
                </ol>
                <h5>Cara menghilangkan jentik nyamuk Jika menemukan, segera ambil salah satu tindakan pemberantasan jentik nyamuk berikut ini:</h5>
                <ol>
                    <li>Daun sirih. Ambil segenggam daun sirih muda dan rebus dengan sekitar 1 liter air. Daun sirih dikenal sebagai bahan antiseptik sehingga bisa membantu membasmi jentik nyamuk. Rebus daun sirih hingga layu dan mengeluarkan aroma khas pada air rebusan yang akan berubah menjadi kehijauan. Dinginkan air rebusan daun sirih, lalu tuangkan ke dalam bak mandi. </li>
                    <li>Ikan cupang. Pelihara satu ikan cupang kecil di dalam akuarium atau bak penampung air hujan. Tidak semua ikan senang makan jentik nyamuk, namun ikan cupang sangat menggemarinya. Jika Anda memiliki bak penampung air hujan sebagai suplai air untuk menyiram kebun atau keperluan rumah tangga lain, cara ini sangat dianjurkan. </li>
                    <li>Biji pepaya dan tawas. Ambil segenggam biji pepaya dan keringkan di bawah terik matahari. Tumbuk biji pepaya kering hingga menjadi bubuk halus dan campur dengan tawas yang telah dihancurkan, gunakan perbandingan 1 takaran bubuk biji pepaya dan 2 takaran tawas. Masukkan campuran tersebut ke kantung kain berserat renggang dan masukkan ke bak mandi untuk memberantas jentik nyamuk. </li>
                    <li>Biji pepaya dan tawas. Ambil segenggam biji pepaya dan keringkan di bawah terik matahari. Tumbuk biji pepaya kering hingga menjadi bubuk halus dan campur dengan tawas yang telah dihancurkan, gunakan perbandingan 1 takaran bubuk biji pepaya dan 2 takaran tawas. Masukkan campuran tersebut ke kantung kain berserat renggang dan masukkan ke bak mandi untuk memberantas jentik nyamuk. Sebagai langkah pencegahan jentik nyamuk, Anda bisa memanfaatkan daun jeruk nipis. Potong-potong atau remas segenggam daun jeruk nipis segar di dalam sekitar 1 liter air hingga daun mengeluarkan aroma khas jeruk. Tuangkan air beraroma jeruk nipis tersebut ke dalam bak mandi. Aroma jeruk nipis tidak disukai nyamuk sehingga efektif untuk mencegah nyamuk bertelur di genangan air tersebut. Cara ini tidak menghilangkan jentik, namun mencegah nyamuk bertelur.</li>
                    <li>Jalankan prinsip 3M—menguras, mengubur, dan menutup—sebagai langkah pencegahan</li>
                    <li>Memberantas jentik nyamuk berarti memutus siklus perkembangbiakan nyamuk</li>
                    <li>Daun sirih, daun jeruk nipis, dan biji pepaya bisa membantu menyingkirkan jentik nyamuk</li>
                </ol>
                <i>Sumber : Cara membasmi jentik nyamuk | Cleanipedia</i>
            </p>"],
            ["Mengonsumsi makanan buah dan sayur setiap hari", "<p>
                Rutin mengkonsumsi buah dan sayur setiap harinya dapat memberikan berbagai manfaat bagi kita. Tentunya dengan porsi yang sesuai dan beragam buah dan sayur yang kandungannya sangat dibutuhkan oleh tubuh. Hasil penelitian secara medis juga membuktikan bahwa rutin mengkonsumsi buah dan sayur atau menjadi vegetarian memiliki kekuatan dan ketahanan tubuh 3 kali lebih besar dibandingkan dengan orang yang hanya rutin mengkonsumsi daging. Berikut manfaat sayur dan buah jika di konsumsi setiap harinya : <br>
                1. Meningkatkan Daya Ingat dan Melindungi Sel-Sel Otak. <br>
                Tahukah anda, ternyata buah dan sayur dapat membantu meningkatkan daya ingat dan melindungi sel-sel otak ? Hal itu dimungkinkan karena adanya kandungan zat antioksidan yang terkandung dalam buah dan sayur. Antioksidan sendiri merupakan molekul yang mampu memperlambat atau mencegah proses oksidasi molekul lain. Oksidasi adalah reaksi kimia yang dapat menghasilkan radikal bebas, sehingga memicu reaksi berantai yang dapat merusak sel. Antioksidan seperti tiol atau asam askorbat (vitamin C) mengakhiri reaksi berantai ini. Berikut adalah 20 buah yang kaya akan vitamin C : Jambu biji, Jeruk, Apel, Delima, Kiwi, Anggur, Stoberi, Pepaya, Alpukat, Sirsak, Mangga, Blewah, Tomat dan masih banyak lagi. Buah berperan positif terhadap kemampuan mengingat dan mengolah informasi di otak serta mencegah kepikunan (Alzheimer). <br>
                2. Mencegah dan Mengobati Penyakit Kanker. <br>
                Kanker adalah penyakit akibat pertumbuhan tidak normal dari sel-sel jaringan tubuh yang berubah menjadi sel kanker. Dalam perkembangannya, sel-sel kanker ini dapat menyebar ke bagian tubuh lainnya sehingga dapat menyebabkan kematian.Terapi dengan diet jus buah dan sayuran yang terprogram dapat mengobati kanker dan berbagai macam penyakit. Buah-buahan yang berwarna merah dan ungu, seperti tomat, strawberry dan buah merah, mengandung banyak lycopene dan anthocyanins yang berkhasiat mengatasi kanker. Buah mampu mencegah kanker secara alami karena mengandung zat anti-karsinogenik (anti-kanker). Di samping itu, hampir semua buah-buahan kaya akan mineral, serat, antioksidan, fitokimia dan vitamin. Nutrisi tersebut berguna untuk memperkuat tubuh Anda dari dalam serta melawan berbagai jenis penyakit secara alami, termasuk kanker. <br>
                3. Sumber Utama Antioksidan. <br>
                Antioksidan merupakan molekul yang mampu memperlambat atau mencegah proses oksidasi molekul lain. Oksidasi adalah reaksi kimia yang dapat menghasilkan radikal bebas, sehingga memicu reaksi berantai yang dapat merusak sel. Untuk menjaga keseimbangan tingkat oksidasi, tumbuhan dan hewan memiliki suatu sistem yang kompleks dari tumpangsuh antioksidan, seperti glutation dan enzim (misalnya: katalase dan superoksida dismutase) yang diproduksi secara internal atau dapat diperoleh dari asupan vitamin C, vitamin A dan vitamin E. Dengan mengkonsumsi buah dan sayur yang cukup, maka
                kebutuhan vitamin sebagai sumber antioksidan akan tercukupi pula. <br>
                <i> Sumber :http://carakupunya.blogspot.com/2016/03/10-manfaat-mengkonsumsi-buah-dan-sayur-setiap-hari.html</i>
            </p>"],
            ["Melakukan aktitas fisik seperti berolahraga", "<p>
                Rutin melakukan aktivitas fisik minimal 30 menit memiliki memiliki banyak manfaat baik bagi tubuh dan memengaruhi kualitas hidup seseorang. Sesibuk apapun Mama, alangkah baiknya untuk menyempatkan beraktivitas fisik cukup dengan durasi minimal 30 menit setiap harinya. Aktivitas fisik sangat penting pada masa pandemi Covid-19 yang masih berlangsung saat ini. Apalagi penyebaran Covid-19 dari hari ke hari kian meningkat. Tentu Mama harus tetap menjaga imun tubuh supaya tetap prima. Aktivitas fisik terutama pada intensitas dan durasi sedang dapat mendukung respons imunitas tubuh dan meningkatkan daya tahan tubuh terhadap penyakit. Aktivitasi fisik juga dapat menghindarkan seseorang dari penyakit jantung, diabetes, dan tekanan darah tinggi. Ini adalah penyakit-penyakit yang kemungkinan besar dapat terjadi pada masa pandemi Covid-19. Manfaat aktivitas fisik lainnya, yaitu meningkatkan kekuatan otot, meningkatkan kualitas hubungan seks, membakar kalori dan mencegah kelebihan berat badan, meningkatkan rasa percaya diri, mengurangi stres dan emosional, membuat tidur lebih nyenyak, serta membuat wajah dan tubuh lebih segar. Nah, apa saja aktivitas fisik yang bisa Mama lakukan di rumah? Yuk, simak apa saja aktivitasnya,
                <br>
                1. Aktivitas fisik harian <br>
                Aktivitas fisik harian adalah aktivitas yang rutin Mama lakukan sehari-hari di rumah. Ada sejumlah aktivitas fisik harian seperti membersihkan rumah yang bisa membakar banyak kalori, yaitu mengepel dan menyapu. Kedua kegiatan ini bisa menjadi alternatif latihan yang bagus untuk membentuk otot lengan. Kemudian, merapikan tempat tidur, cuci-jemur baju, dan membersihkan jendela adalah latihan peregangan yang bagus untuk meningkatkan fleksibilitas dan mengencangkan otot paha. Termasuk juga berjalan ke sana ke mari atau naik-turun tangga adalah gerakan aerobik yang baik. Perlu diingat, aktivitas membersihkan rumah mungkin bukan cara yang paling ideal untuk cepat membakar kalori tetapi pertimbangkan manfaat lainnya seperti menjemur seprai dan menyapu dapat membantu Mama untuk menjaga diri dari alergi debu sekaligus mengusir bakteri penyebab penyakit lainnya. <br>
                2. Aktivitas sederhana seperti berjalan kaki <br>
                Mama juga bisa melakukan aktivitas sederhana seperti jalan di tempat dalam jangka waktu tertentu atau berjalan di sekeliling rumah, mengurangi banyak duduk dan berbaring, dan selalu membiasakan untuk rutin bangun berdiri setiap 30 menit dari posisi duduk. Setiap peningkatan aktivitas akan sangat bermanfaat untuk kesehatan. Dibandingkan duduk diam di sofa, melangkah lebih sering maka lebih baik. Berjalan cepat atau berolahraga dengan intensitas sedang sebanyak 30 menit, 5 kali seminggu, dapat menurunkan risiko Penyakit Jantung Koroner (PJK) sebanyak 19% atau hampir 1/5 kali lebih rendah. Sebagai langkah awal, berjalan kaki merupakan aktivitas fisik yang mudah, murah, dan dapat dilakukan semua orang. Jika dalam kondisi fit, minimal melakukan jalan cepat (kurang lebih 100 langkah per menit) selama 30 menit yang dapat memberi tambahan 3.000 - 4.000 langkah. Usahakan untuk mencapai target minimal 10.000 langkah per hari. <br>
                3. Jogging setiap pagi hari minimal 30 menit saja <br>
                Jogging adalah pilihan aktivitas fisik yang sehat dan murah yang bisa Mama lakukan setiap pagi. Jogging memberikan banyak manfaat bila dilakukan secara rutin, antara lain bisa menekan risiko gangguan tekanan darah hingga 39% serta mengurangi risiko akibat masalah pembuluh darah karena endapan kolesterol seperti penyakit jantung. Untuk melakukan jogging, hanya butuh sepatu lari yang nyaman dipakai. Tak usah jauh-jauh, Mama bisa melakukan jogging dengan berlari di sekitar lingkungan rumah atau mengeliling komplek rumah sebelum memulai aktivitas di pagi hari. Waktu yang efektif untuk melakukan jogging di pagi hari sekitar pukul 06.00 – 09.00 WIB. <br>
                4. Aerobik di rumah saja <br>
                Tak harus memiliki instruktur khusus atau menjadi anggota klub kebugaran untuk bisa latihan aerobik. Mama bisa melakukannya di rumah lewat video latihan aerobik di YouTube. Sebaiknya latihan aerobik dilakukan selama 60 menit sebanyak satu kali dalam seminggu. Namun, bagi pemula sebaiknya melakukannya dengan durasi yang lebih pendek sekitar 15-30 menit saja. Aerobik yang dilakukan secara rutin bisa melatih daya tahan dan koordinasi antara kaki, perut, lengan, dan tangan. Aerobik juga akan mendorong pembuluh darah untuk menyediakan cukup oksigen dalam otot dan menjauhkan tubuh dari ancaman virus serta bakteri yang menimbulkan penyakit. Aerobik juga bisa membuat awet muda karena pembakaran kalori, lemak, dan pembuangan keringat akan membantu meningkatkan elastisitas otot dan kulit. <br>
                5. Yoga, aktivitas fisik yang menenangkan <br>
                Yoga merupakan aktivitas fisik yang mengombinasikan gerakan bagian tubuh dan membutuhkan konsentrasi serta ketenangan. Aktivitas satu ini bisa membuat tubuh dan pikiran Mama lebih rileks. Pagi hari adalah waktu paling baik untuk melakukan yoga. Usahakan Mama melakukan yoga di ruangan yang jauh dari keramaian serta memiliki sirkulasi udara yang baik. Mama bisa melakukannya lewat video-video latihan Yoga yang ada di media sosial seperti YouTube. Yoga memiliki banyak manfaat, antara lain dapat meningkatkan penguasaan emosi, melancarkan peredaran darah, membakar lemak, detoksifikasi dan pengeluaran racun dalam tubuh, serta meningkatkan fungsi pernapasan dan kerja jantung.
                <i>sumber : Yuk, Rutin Lakukan Aktivitas Fisik 30 Menit Setiap Hari! | Popmama.com</i>
            </p>"],
            ["Tidak meroko", "<p>
                <p> 
                    Bahaya dan Dampak Asap Rokok di Dalam Rumah Masa sekarang merokok sudah menjadi sebuah rutinitas bagi perokok. Tanpa perduli dimana dan ada siapa disekitar saat sedang merokok. Merokok sendiri meninggalkan bau serta racun pada baju, ruangan dan benda disekitar perokok. Rokok yang dibakar akan meninggalkan nikotin di ruangan, tentu hal ini merupakan bahaya. Padahal nikotin sendiri dapat berada pada permukaan benda selama berhari-hari. Permukaan yang ditempeli zat-zat beracun ini tentu akan sangat berbahaya kalau sampai disentuh oleh jari-jari balita. Tentu saja merokok bersifat karsinogenik dimana zat karsinogenik muncul dari rokok yang belum dibakar atau asap rokok atau biasa disebut tobacco-spesific nitrosamines (TSNAs). TSNAs lebih cepat terbentuk dalam ruangan/dalam rumah yang dipakai untuk merokok. Jejak yang ditinggalkan pada perokok saat merokok akan membentuk zat beracun yang kemudian melekat pada perabotan dalam rumah. Jika dalam rumah terdapat anak-anak tentu akan sangat berbahaya karena memiliki kontak erat dengan perabotan rumah dan tidak menyadari akan zat beracun yang menempel. Zat sisa rokok pada perokok yang merokok di dalam rumah akan bertahan dalam waktu yang lama hingga puluhan tahun, dan jumlah kadar racun yang tersimpan di dalam rumah akan terus bertambah. Hal tersebut yang menyebabkan siapapun dapat terpapar dampaknya. Lingkungan dalam rumah pun menjadi tidak sehat karena telah terpapar hasil merokok di dalam rumah. Salah satu zat yang diketahui bersifat karsinogenik dan dapat tersimpan di lingkungan selama bertahun-tahun adalah polycyclic aromatic hydrocarbons (PAH). Komponen ini menyerap ke dalam permukaan yang ada dalam rumah seperti dinding, furnitur, dan benda berbahan gypsum serta karpet di dalam rumah. Dampak yang ditimbulkan pada lingkungan dengan adanya perokok dalam rumah ialah kanker bahkan meningkatkan risiko kanker pada nonperokok/perokok pasif dalam rumah karena sudah terkontaminasinya zat nikotin pada dalam rumah. Paparan zat sisa rokok pada aktivitas rokok dalam rumah juga dapat memicu inflamasi paru yang dapat berakibat pada penyakit paru obstruksi kronis (PPOK) dan asma, serta menghambat penyembuhan luka pada permukaan kulit. Dampak ini tentu saja tidak hanya dapat dirasakan oleh si perokok namun juga pada third hand smoke atau orang ketiga. Orang ketiga ini biasanya adalah anak-anak yang tinggal dalam lingkungan rumah perokok. Bahaya perokok ke-3 (third-hand smoke) antara lain :
                </p>
                <ul>
                    <li>Menyebabkan lebih banyak kasus kanker</li>
                    <li>Merusak DNA</li>
                    <li>Membentuk karsinogenik</li>
                    <li>Mengancam kesehatan anak</li>
                </ul>
                <p>
                    Bahkan diketahui bahwa rokok dapat ikut menyumbangkan kasus stunting pada anak asap rokok mengganggu fungsi penyerapan gizi anak, kelainan konginetal dan BBLR juga dalam hal ekonomi, membeli rokok membuat orang tua mengurangi jatah belanja makanan bergizi, biaya pendidikan, biaya kesehatan dan kebutuhan penting lainnya karena alokasi dana yang seharusnya digunakan untuk makanan bergizi anak dan keluarga serta tabungan untuk pendidikan maupun kesehatan malah digunakan untuk merokok.
                </p>
                <p>
                    Menurut jurnal yang ada bahkan merokok dalam rumah menyebabkan penyakit Bronchopneumonia atau biasa disebut salah satu infeksi saluran pernafasan bagian bawah. Para keluarga yang mempunyai balita tidak menyadari tentang bahaya dari penyakit ini. Salah satu penyebab penyakit bronchopneumonia adalah perilaku merokok orang tua yang biasa merokok dalam rumah dan meninggalkan zat beracun pada pakaian, kulit bahkan perabotan rumah. Merokok dirumah sangat tidak disarankan bagi orang tua yang mempunyai anak balita, apalagi saat anak-anak mereka berada didekatnya. Dampak merokok salah satunya dapat menyebabkan penyakit bronchopneumonia pada balita Merokok di dalam rumah tidak hanya berbahaya bagi perokok tetapi juga bagi orang yang tinggal di rumah tersebut, karena Meninggalkan zat – zat beracun di perabot rumah, karpet, tirai bahkan di dinding Asap rokok mengandung ribuan bahan kimia diantaranya banyak zat beracun dan bersifat karsinogenik yang bisa tinggal di suatu permukaan Bila terpapar dalam jangka waktu yang lama dapat menyebabkan meningkatkan resiko kanker, serangan asma, masalah paru–paru, infeksi tenggorokan dan mata Asap rokok dapat diserap ke semua permukaan yang berpori, zat beracun dari asap rokok akan menetap lama di semua perabot rumah tangga yang terkontaminasi Merokok di dalam rumah tentu akan membahayakan kesehatan anak yang sering bermain di dalam rumah Peneliti menyatakan anak – anaka sebagai Perokok ke -3 (mereka tidak merokok dan tidak terpapar secara langsung) tetapi terpapar zat berbahaya dari asap rokok yang telah mengendap di perabot rumah Daripada menanggulangi bahaya merokok karena ada dalam rumah lebih baik dicegah dengan tidak merokok dalam rumah. Karena untuk menghilangkan zat sisa asap rokok di dalam rumah, diperlukan pembersihan seluruh sudut rumah, barang-barang, dan furnitur, hingga mengecat ulang dinding rumah untuk meminimalisir kadar racun yang melekat di dinding hal ini tentu merepotkan maka lebih baik dengan mencegah agar tidak terjadi dampak pada risiko kesehatan orang tercinta.
                    <i>Sumber : Bahaya dan Dampak Asap Rokok di Dalam Rumah | Dinas Kesehatan Kota Surakarta</i>
                </p>
            </p>"],
        ];
        foreach ($data_text as $value) {
            Indikator::create([
                'judul' => $value[0],
                'isi' => $value[1],
                'foto' => 'default.jpg',
            ]);
        }
    }
}
