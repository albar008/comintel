import "../assets/css/main.scss";
import GlobalScrollHandler from "./modules/GlobalScrollHandler";
import Particle from "./modules/Particle";
import HeroScript from "./modules/HeroScript";
import AboutCorpVideo from "./modules/AboutCorpVideo";

gsap.registerPlugin(
  ScrollTrigger,
  ScrollSmoother,
  ScrollToPlugin,
  DrawSVGPlugin
);

const particle = new Particle();
const fronPage = new GlobalScrollHandler();
const gsapAnimation = new HeroScript();
const corpVideo = new AboutCorpVideo();
