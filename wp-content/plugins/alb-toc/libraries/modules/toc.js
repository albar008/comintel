import "../../assets/toc-view-style.scss";
import $ from "jquery";
import { isEmpty as _isEmpty } from "lodash";
import { encode, decode } from "html-entities";

class Toc {
	#tocData = albToc?.data;
	#tocTitle = albToc?.title;
	#tocSettings = JSON.parse(albToc?.alb_toc_settings);
	#blogWrapper;
	#timeOutCanvasOpen;
	constructor() {
		this.#blogWrapper = $(".content-container");
		this.#checkStorageOpenOffCanvas();
		this.#loadContent();
		this.#events();
	}
	#checkStorageOpenOffCanvas() {
		const isCanvasOpen = localStorage.getItem("isShowOffCanvas");
		if (isCanvasOpen === "1") {
			this.#timeOutCanvasOpen = setTimeout(() => {
				$("#albTocCanvas").addClass("show");
			}, 200);
		}
	}
	#events() {
		const self = this;
		let scrollPosition = 0;
		$(".toc-list-container ul li, .toc-list-shc-container ul li").on(
			"click",
			"a",
			function (e) {
				// e.preventDefault();
				e.stopPropagation();
				// globalThis?.smoother?.kill();
				const target = $($(this).attr("href"));
				scrollPosition = target.offset().top - 100;
				if (target.length) {
					$("html, body").animate(
						{
							scrollTop: scrollPosition,
						},
						100,
					);
				}
			},
		);

		$(".btn-toggle-alb-toc").on(
			"click",
			"a[data-toggle='albTocCanvas']",
			function (e) {
				e.preventDefault();
				localStorage.setItem("isShowOffCanvas", "1");
				$("#albTocCanvas").addClass("show");
			},
		);

		// Hide OffCanvas
		$(document).on("click", function (e) {
			let currentTarget = $(e.target).closest(".alb-toc-offcanvas");
			let handlerTarget = $(e.target).closest(".btn-toggle-alb-toc");
			if (
				!$(currentTarget).hasClass("alb-toc-offcanvas") &&
				!$(handlerTarget).hasClass("btn-toggle-alb-toc")
			) {
				localStorage.setItem("isShowOffCanvas", "0");
				$("#albTocCanvas").removeClass("show");
				if (self.#timeOutCanvasOpen) {
					clearTimeout(self.#timeOutCanvasOpen);
				}
			}
		});

		$("button[data-toggle='albCloseTocCanvas']").on("click", function (e) {
			e.preventDefault();
			localStorage.setItem("isShowOffCanvas", "0");
			$("#albTocCanvas").removeClass("show");
			if (self.#timeOutCanvasOpen) {
				clearTimeout(self.#timeOutCanvasOpen);
			}
		});

		$(document).on("keydown", this.#keyPressDispatcher.bind(this));
	}

	#keyPressDispatcher(e) {
		const isCanvasOpen = localStorage.getItem("isShowOffCanvas");
		if (e.keyCode == 27 && isCanvasOpen === "1") {
			$("#albTocCanvas").removeClass("show");
		}
	}

	#renderTocChildren(children) {
		const list = children
			.map((item) => {
				if (_isEmpty(item?.children)) {
					return `<li><a href="#${item?.tocId}">${encode(
						item?.content,
					)}</a></li>`;
				} else {
					return `<li><a href="#${item?.tocId}">${encode(
						item?.content,
					)}</a>${this.#renderTocChildren(item?.children)}</li>`;
				}
			})
			.join("");
		const html = `
      <ul>
        ${list}
      </ul>`;
		return html;
	}
	#renderTocList() {
		const list = this.#tocData
			.map((item) => {
				if (_isEmpty(item?.children)) {
					return `<li><a href="#${item?.tocId}">${encode(
						item?.content,
					)}</a></li>`;
				} else {
					return `<li><a href="#${item?.tocId}">${encode(
						item?.content,
					)}</a>${this.#renderTocChildren(item?.children)}</li>`;
				}
			})
			.join("");
		const html = `
      <ul>
        ${list}
      </ul>`;
		return html;
	}
	#loadContent() {
		if (
			!_isEmpty(this.#tocData) &&
			this.#tocSettings?.alb_toc_is_using_shortcode !== "1"
		) {
			const _html = `<div class="btn-toggle-alb-toc">
        <a class="btn btn-primary" data-toggle="albTocCanvas" href="#albTocCanvas" role="button"
          aria-controls="albTocCanvas">
          ${this.#tocTitle}
        </a></div>
        <div class="alb-toc-offcanvas" tabindex="-1" id="albTocCanvas" aria-labelledby="albTocCanvasLabel">
          <div class="alb-toc-offcanvas__header">
            <h5 class="offcanvas-title" id="albTocCanvasLabel">${
							this.#tocTitle
						}</h5>
            <button type="button" title="or press (esc) key" class="btn-close" data-toggle="albCloseTocCanvas" aria-label="Close"></button>
          </div>
          <div class="alb-toc-offcanvas__body">
						<div class="toc-list-container">
            	${decode(this.#tocData)}
						</div>
          </div>
        </div>
      `;
			this.#blogWrapper.prepend(_html);
		}
	}
}

export default Toc;
