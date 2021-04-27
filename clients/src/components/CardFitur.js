import propTypes from "prop-types";
import { useState } from "react";
import Style from "./Card.module.css";

const CardFitur = ({ icon, title, desc }) => {
  const [shadow, setShadow] = useState("");

  return (
    <>
      <div
        className={`${Style.card} card mb-3 ${shadow} `}
        onMouseOver={() => setShadow("shadow")}
        onMouseOut={() => setShadow("")}
      >
        <div className={`${Style.cardWrapper} row g-0`}>
          <div className={`${Style.cardIcon} col-md-4`}>
            <img src={icon} className={Style.icon} alt="icon gratis" />
          </div>
          <div className="col-md-8">
            <div className={`${Style.cardBody} card-body`}>
              <h5 className="card-title">{title}</h5>
              <p className="card-text">{desc}</p>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

CardFitur.propTypes = {
  icon: propTypes.any.isRequired,
  title: propTypes.string.isRequired,
  desc: propTypes.string.isRequired,
};

export default CardFitur;
