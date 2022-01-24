import React from "react";
import {Switch, Route } from "react-router-dom";
import AddNewsFeed from "./components/AddNewsFeed";
import ShowNewsFeed from "./components/ShowNewsFeed";
import './App.css';
import UpdateNewsFeed from "./components/UpdateNewsFeed";

export default function App() {
  return (
    <Switch>
      <Route exact path="/" component={ShowNewsFeed} />
      <Route exact path="/addnewsfeed" component={AddNewsFeed} />
      <Route
        exact
        path="/addnewsfeedupdate/:news_id"
        component={UpdateNewsFeed}
      />
    </Switch>
  );
}
