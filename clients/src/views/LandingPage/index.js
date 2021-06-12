import { useEffect, useState } from "react";
import axios from "axios";

import style from "./LandingPage.module.css";
import Hero from "../../components/Hero";
import Loading from "../../components/Loading";

export default function LandingPage() {
  // const [articles, setArticles] = useState([]);
  // const [err, setErr] = useState("");
  // const [loading, setLoading] = useState(false);

  const [artikel, setArtikel] = useState("");

  useEffect(() => {
    // const getDefaultAPI = async () => {
    //   setLoading(true);
    //   try {
    //     const res = await axios.get(
    //       `https://newsapi.org/v2/top-headlines?country=us&apiKey=1e132d01ae8043a9810440981945a39b`,
    //       {
    //         params: {
    //           category: "science",
    //         },
    //       }
    //     );
    //     setLoading(false);
    //     setArticles(res.data.articles);
    //   } catch (err) {
    //     setLoading(false);
    //     setErr(err);
    //   }
    // };
    // getDefaultAPI();

    document.title = "Kipas Putar | Tempat baca ";
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, []);

  const handleSubmit = e => {
    e.preventDefault();
    // console.log(e.target.value);
    console.log(artikel);
  };

  return (
    <>
      <Hero
        image={`${process.env.PUBLIC_URL}Background_Landing.png`}
        title1="Kipas Putar"
        title2="Tempat yang Haus Pengetahuan"
      />

      <section id={"artikel"} className={`${style.idArticle} container`}>
        {/* {loading ? (
          <Loading />https://images.theconversation.com/files/350865/original/file-20200803-24-50u91u.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=1200&h=675.0&fit=crop
        ) : articles ? (
          articles.map(article => (
            <div className="card mt-4">
              <div className="card-header">{article.title}</div>
              <div className="card-body">{article.description}</div>
            </div>
          ))
        ) : (
          <div className="card bg-danger text-white">
            <h5>{err}</h5>
          </div>
        )} */}
      </section>
    </>
  );
}
