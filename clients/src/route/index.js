import { BrowserRouter as R, Switch, Route } from "react-router-dom";
import Layout from "../components/Layout";
import Home from "../views/Home/index";
import LandingPage from "../views/LandingPage";

const Router = () => {
  return (
    <>
      <R>
        <Switch>
          <Route path="/" exact>
            <Layout>
              <LandingPage />
            </Layout>
          </Route>
          <Route path="/home">
            <Layout>
              <Home />
            </Layout>
          </Route>
        </Switch>
      </R>
    </>
  );
};
export default Router;
