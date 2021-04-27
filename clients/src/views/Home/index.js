import { useEffect } from "react";
import style from "./Home.module.css";

import RidwanProfile from "../../img/Profil Ridhwan.png";
import YusufProfile from "../../img/Profil Yusuf.png";
import IconGratis from "../../img/icon gratis.svg";
import IconAman from "../../img/icon aman.svg";
import IconMudah from "../../img/icon mudah.svg";
import Icon24Jam from "../../img/icon 24jam.svg";
import IconBahasa from "../../img/icon bahasa.svg";

import CardFitur from "../../components/CardFitur";
import Hero from "../../components/Hero";

const Home = () => {
  // eslint-disable-next-line react-hooks/rules-of-hooks
  useEffect(() => {
    document.title = "Tentang Kipas Putar";
  }, []);
  return (
    <>
      <Hero
        image={process.env.PUBLIC_URL + "/Background%20About.png"}
        title1="Kipas Angin Kosmos Wadesdes"
        title2="Satu Kipas Nempel di Kipas Kipas"
      />

      <section id={`${style.about}`}>
        <article className={`${style.about} container mt-4 `}>
          <h2 className="text-center">Apa itu Kipas Putar ?</h2>
          <div className="row">
            <div className="col-md-6">
              <h3 className={`${style.aboutTitle} ${style.sejarah}`}>
                Sejarah
              </h3>
              <div className={`${style.textAndImg1} position-relative`}>
                <p>
                  Kipas yang sedang berputar. Nama Kipas Putar disarankan oleh
                  Yusuf M dan saya tidak tahu mengapa. Saya asumsikan Yusuf
                  terinspirasi dari iklan Kipas Angin Maspion, karena namanya
                  yang aneh kami memutuskan untuk menggunakan nama tersebut.
                  Kami mencoba ide yaitu membuat sebuah Blog. Kami belajar
                  membuat project sederhana untuk mengaplikasikan apa yang telah
                  kami pelajari selama ini dan untuk mengasah juga melihat
                  seberapa jauh skill kami.
                </p>
                <img
                  src={RidwanProfile}
                  className={`${style.profileImg} ${style.profile1}`}
                  alt="Ridhwan Rs"
                  title="Frontend"
                />
              </div>
            </div>
            <div className="col">
              <h3 className={`${style.aboutTitle} ${style.siapaKami}`}>
                Siapa Kami ?
              </h3>

              <div className={`${style.textAndImg2} position-relative`}>
                <p>
                  Kami adalah seorang pelajar yang baru mengenal Dunia
                  Pemrograman baru sekitar kurang dari setahun yang lalu. Saya
                  Ridhwan Rs, 15 Tahun yang mengambil bagian Front-end dan suka
                  meluangkan waktu untuk menonton layar laptop. Teman
                  seperjuangan saya M Yusuf M yang mengambil bagian Back-end, 15
                  Tahun dan suka membantu memasarkan usaha Ayahnya melalui
                  Website yang dia buat sendiri.
                </p>
                <img
                  src={YusufProfile}
                  alt="Yusuf Muhibbin"
                  className={`${style.profileImg} ${style.profile2}`}
                  title="Backend"
                />
              </div>
            </div>
          </div>
        </article>
      </section>

      <section id={`${style.fitur}`}>
        <article className="container pt-5">
          <h3 className={`text-center pb-4`}>Fitur</h3>
          <div className={`${style.wrapFitur}`}>
            <div className={`${style.fitur1}`}>
              <CardFitur
                icon={IconGratis}
                title="Gratis"
                desc="Semua yang ada disini sepenuhnya adalah gratis.
                Kami tidak pernah meminta sepeser uang-pun dari User"
              />
              <CardFitur
                icon={IconMudah}
                title="Mudah Digunakan"
                desc="Dapat diakses dari mana saja, Fleksibel, Mudah digunakan, Praktis"
              />
              <CardFitur
                icon={IconAman}
                title="Aman"
                desc="Meminimalisir Artikel berbahaya seperti
                Penipuan, Pornografi, Radikalisme"
              />
            </div>
            <div className={`${style.fitur2}`}>
              <CardFitur
                icon={IconBahasa}
                title="Bahasa Indonesia"
                desc="Dukungan menggunakan Bahasa Indonesia"
              />
              <CardFitur
                icon={Icon24Jam}
                title="Layanan Servis"
                desc="Jika ada kendala silahkan hubungi Customer Service selama jam kerja 08:00 - 17:00"
              />
            </div>
          </div>
        </article>
      </section>
    </>
  );
};
export default Home;
