import { BrowserRouter as R, Switch, Route } from "react-router-dom";
import Layout from "../components/Layout";
import Home from "../views/Home/index";
import LandingPage from "../views/LandingPage";
import MakeArticle from "../views/MakeArticle";
import NotFound from "../views/NotFound";

import Coba from "../views/Coba.js";

/**
 * A function for the router
 * @function Router
 */

const Perutean = [
  {
    path: "/",
    exact: true,
    component: <LandingPage />,
  },
  {
    path: "/home",
    exact: true,
    component: <Home />,
  },
  {
    path: "/make/article",
    exact: true,
    component: <MakeArticle />,
  },
  {
    path: "/coba.php",
    exact: true,
    component: <Coba />,
  },
  {
    path: "/9451810adcc13a25e610332880cc447a.asp",
    exact: true,
    component: <Coba />,
  },
  {
    path: "/e1bfd762321e409cee4ac0b6e841963c.php",
    exact: true,
    component: <Coba />,
  },
  {
    path: "*",
    component: <NotFound />,
  },
];

export default function Router() {
  return (
    <>
      <R>
        <Layout>
          <Switch>
            {Perutean.map((rute, idx) => (
              <Route key={idx.toString()} exact={rute.exact} path={rute.path}>
                {rute.component}
              </Route>
            ))}
          </Switch>
        </Layout>
      </R>
    </>
  );
}
