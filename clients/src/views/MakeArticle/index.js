import { useEffect, useState } from "react";

// ~~+ CKeditor
// import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
// import { CKEditor } from "@ckeditor/ckeditor5-react";

// ~~+ firebase
import { storage } from "./../../config/firebase";

// ~~+ style
import style from "./.module.css";

export default function MakeArticle() {
  // const [writingArticle, setWritingArticle] = useState("");
  const [title, setTitle] = useState("");
  const [img, setImg] = useState(null);
  const [urlImg, setUrlImg] = useState("");
  const [progress, setProgress] = useState(0);

  // const $ = a => document.querySelector(`${a}`);
  // handle gambar ketika di insert
  const handleChangeImage = e => {
    // store gambar ke state
    if (e.target.files[0]) {
      // console.log("gambar =>  ", e.target.files[0]);
      //* Cek type file harus gambar
      if (
        !["image/png", "image/jpg", "image/jpeg", "image/svg+xml"].includes(
          e.target.files[0].type
        )
      ) {
        console.log("Harus berformat gambar(.png, .jpg, .jpeg, .svg)");
      } else {
        console.log("Format gambar benar");
        setImg(e.target.files[0]);
      }
    }
  };

  const handleSubmit = () => {
    //* ~~++ Upload image ++~~ *\\
    // storage.reference("createNewFolder/img_name.png").plsDoThis(fileImage)
    const uploadTask = storage.ref(`images/${img.name}`).put(img);
    uploadTask.on(
      "state_changed",
      // progress upload
      snapshot => {
        const progress = Math.round(
          (snapshot.bytesTransferred / snapshot.totalBytes) * 100
        );
        setProgress(progress);
      },
      err => console.log(err),
      // success
      () => {
        storage
          .ref(`images`)
          .child(img.name)
          .getDownloadURL()
          // setelah getDownloadUrl kita akan dapat url yang akan kita olah di then
          .then(url => setUrlImg(url));
      }
    );
  };

  useEffect(() => {
    // menghilangkan beberapa tools dari ckeditor
    // $(".ck-file-dialog-button").style.display = "none";
    
    console.log("OK");
  }, []);

  return (
    <>
      <div className={`container mt-5 `}>
        <section className={`${style.form}`}>
          {/* Input article */}
          <div className="col-md-8 m-auto">
            <div className="row mb-3">
              <label
                htmlFor="title111"
                className="col-sm-2 col-form-label"
                name="judul"
              >
                Judul
              </label>
              <div className="col-sm-10">
                <input
                  type="email"
                  className="form-control"
                  id="title111"
                  value={title}
                  onChange={e => setTitle(e.target.value)}
                />
              </div>
            </div>
            <div className="row mb-3">
              <label htmlFor="inputGambar" className="col-sm-2 col-form-label">
                Gambar
              </label>
              <div className="col-sm-10">
                <input
                  type="file"
                  className="form-control"
                  id="inputGambar"
                  accept="image/*"
                  onChange={handleChangeImage}
                />
              </div>
            </div>
            {/* <CKEditor
              editor={ClassicEditor}
              onChange={(event, editor) => setWritingArticle(editor.getData())}
            />
             */}
          </div>
          {/* end Input */}
          <button onClick={handleSubmit}>Terbitkan</button>
        </section>

        <h3>
          URL ={">"} {urlImg}
        </h3>
        <progress value={progress} max="100" />
      </div>
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
      <br />
    </>
  );
}
