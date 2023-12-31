!(function (e) {
  "use strict";
  e.fn.jbvalidator = function (t) {
    t = e.extend(
      {},
      {
        language: "",
        errorMessage: !0,
        successClass: !1,
        html5BrowserDefault: !1,
        validFeedBackClass: "valid-feedback",
        invalidFeedBackClass: "invalid-feedback",
        validClass: "is-valid",
        invalidClass: "is-invalid",
      },
      t
    );
    let a = this,
      i = {
        maxValue: "Value must be less than or equal to %s.",
        minValue: "Value must be greater than or equal to %s.",
        maxLength: "Maksimal inputan %s karakter.",
        minLength: "Minimal inputan %s karakter atau lebih.",
        minSelectOption: "Please select at least %s options.",
        maxSelectOption: "Please select at most %s options.",
        groupCheckBox: "Please select at least %s options.",
        equal: "Password tidak sesuai.",
        fileMinSize: "File size cannot be less than %s bytes.",
        fileMaxSize: "File upload tidak boleh lebih dari %s mb.",
        number: "Please enter a number.",
        HTML5: {
          valueMissing: {
            INPUT: {
              default: "Inputan tidak boleh kosong.",
              checkbox: "Please check this box.",
              radio: "Please select one of these options.",
              file: "Please select a file.",
            },
            SELECT: "Mohon pilih opsi yang tersedia.",
            TEXTAREA: "Inputan tidak boleh kosong.",
          },
          typeMismatch: {
            email: "Email tidak valid.",
            url: "Please enter a URL.",
          },
          rangeUnderflow: {
            date: "Value must be %s or later.",
            month: "Value must be %s or later.",
            week: "Value must be %s or later.",
            time: "Value must be %s or later.",
            datetimeLocale: "Value must be %s or later.",
            number: "Value must be greater than or equal to %s.",
            range: "Value must be greater than or equal to %s.",
          },
          rangeOverflow: {
            date: "Value must be %s or earlier.",
            month: "Value must be %s or earlier.",
            week: "Value must be %s or earlier.",
            time: "Value must be %s or earlier.",
            datetimeLocale: "Value must be %s or earlier.",
            number: "Value must be less than or equal to %s.",
            range: "Value must be less than or equal to %s.",
          },
          stepMismatch: {
            date: "You can only select every %s. day in the date calendar.",
            month: "You can only select every %s. month in the date calendar.",
            week: "You can only select every %s. week in the date calendar.",
            time: "You can only select every %s. second in the time picker.",
            datetimeLocale:
              "You can only select every %s. second in the time picker.",
            number: "Please enter a valid value. Only %s and a multiple of %s.",
            range: "Please enter a valid value. Only %s and a multiple of %s.",
          },
          tooLong:
            "Please lengthen this text to %s characters or less (you are currently using %s characters).",
          tooShort:
            "Please lengthen this text to %s characters or more (you are currently using %s characters).",
          patternMismatch: "Please match the request format. %s",
          badInput: { number: "Please enter a number." },
        },
      };
    const n = "input, textarea, select";
    let l = 0;
    t.language &&
      e.getJSON(t.language, function (e) {
        i = e;
      }),
      e(a).on("submit", function (e) {
        (l = 0), r(this, e), l && (e.preventDefault(), e.stopPropagation());
      });
    let r = function (t, i) {
        let r = i || "";
        return (
          (l = 0),
          e(t || a)
            .find(n)
            .each((e, t) => {
              o(t, r);
            }),
          l
        );
      },
      s = function () {
        e(a)
          .find(n)
          .each((t, a) => {
            e(a).off("input"),
              e(a).on("input", function (t) {
                if ((o(this, t), p(a, "data-v-equal"))) {
                  let t = e(a).attr("data-v-equal");
                  e(t).one("input", function () {
                    let t = e(this).attr("id");
                    e('[data-v-equal="#' + t + '"]').trigger("input");
                  });
                }
              });
          });
      },
      o = function (e, a) {
        e.setCustomValidity(""),
          !1 !== e.checkValidity()
            ? Object.values(f).map((t) => {
                let i = t.call(t, e, a);
                i && e.setCustomValidity(i);
              })
            : t.html5BrowserDefault || e.setCustomValidity(d(e)),
          !1 === e.checkValidity() ? (u(e, e.validationMessage), l++) : c(e);
      },
      u = function (a, i) {
        if (
          (e(a).removeClass(t.validClass),
          e(a).addClass(t.invalidClass),
          (i = e(a).data("vMessage") ?? i),
          t.errorMessage)
        ) {
          let n = e(a).parent();
          if (e(n).length) {
            let a = e(n).find("." + t.invalidFeedBackClass);
            e(a).length
              ? e(a).html(i)
              : e(n).append(
                  '<div class="' + t.invalidFeedBackClass + '">' + i + "</div>"
                );
          }
        }
      },
      c = function (a) {
        e(a).removeClass(t.invalidClass),
          t.successClass && e(a).addClass(t.validClass);
      },
      f = {
        multiSelectMin: function (t) {
          if ("SELECT" === e(t).prop("tagName") && e(t).prop("multiple")) {
            let a = e(t).data("vMinSelect"),
              n = e(t).find("option:selected").length;
            if (n < a && (e(t).prop("require") || n > 0))
              return i.minSelectOption.sprintf(a);
          }
          return "";
        },
        multiSelectMax: function (t) {
          if ("SELECT" === e(t).prop("tagName") && e(t).prop("multiple")) {
            let a = e(t).data("vMaxSelect"),
              n = e(t).find("option:selected").length;
            if (n > a && (e(t).prop("require") || n > 0))
              return i.maxSelectOption.sprintf(a);
          }
          return "";
        },
        equal: function (t) {
          let a = e(t).data("vEqual");
          if (a) {
            let n = e(a).attr("title");
            if (e(a).val() !== e(t).val()) return i.equal.sprintf(n || "");
          }
          return "";
        },
        groupCheckBox: function (t, a) {
          if (p(t, "type", "checkbox")) {
            let n = e(t).closest("[data-checkbox-group]"),
              l = e(n).data("vMinSelect"),
              r = n.find("input[type=checkbox]:checked").length,
              s = void 0 === e(n).data("vRequired") ? 0 : 1;
            if (
              n &&
              (void 0 !== a.originalEvent &&
                "input" === a.originalEvent.type &&
                e(n)
                  .find("input[type=checkbox]")
                  .each((t, a) => {
                    e(a).trigger("input");
                  }),
              r < l && (s || r > 0) && !1 === e(t).prop("checked"))
            )
              return i.groupCheckBox.sprintf(l);
          }
          return "";
        },
        customMin: function (t) {
          if (p(t, "data-v-min")) {
            let a = e(t).data("vMin"),
              n = e(t).val();
            if (isNaN(n) && (e(t).prop("require") || n.length > 0))
              return i.number;
            if (n < a && (e(t).prop("require") || n.length > 0))
              return i.minValue.sprintf(a);
          }
          return "";
        },
        customMax: function (t) {
          if (p(t, "data-v-max")) {
            let a = e(t).data("vMax"),
              n = e(t).val();
            if (isNaN(n) && (e(t).prop("require") || n.length > 0))
              return i.number;
            if (n > a && (e(t).prop("require") || n.length > 0))
              return i.maxValue.sprintf(a);
          }
          return "";
        },
        customMinLength: function (t) {
          if (p(t, "data-v-min-length")) {
            let a = e(t).data("vMinLength"),
              n = e(t).val().length;
            if (n < a && (e(t).prop("require") || n > 0))
              return i.minLength.sprintf(a, n);
          }
          return "";
        },
        customMaxLength: function (t) {
          if (p(t, "data-v-max-length")) {
            let a = e(t).data("vMaxLength"),
              n = e(t).val().length;
            if (n > a && (e(t).prop("require") || n > 0))
              return i.maxLength.sprintf(a, n);
          }
          return "";
        },
        fileMinSize: function (t) {
          if (p(t, "type", "file")) {
            let a = e(t).data("vMinSize");
            for (let e = 0; e < t.files.length; e++)
              if (a && a > t.files[e].size) return i.fileMinSize.sprintf(a);
          }
          return "";
        },
        fileMaxSize: function (t) {
          if (p(t, "type", "file")) {
            let a = e(t).data("vMaxSize");
            for (let e = 0; e < t.files.length; e++)
              if (a && a < t.files[e].size)
                return i.fileMaxSize.sprintf(Math.ceil(a / (1024 * 1024)));
          }
          return "";
        },
      },
      d = function (t) {
        if (t.validity.valueMissing) {
          if ("INPUT" === t.tagName)
            return void 0 === i.HTML5.valueMissing.INPUT[t.type]
              ? i.HTML5.valueMissing.INPUT.default
              : i.HTML5.valueMissing.INPUT[t.type];
          if (void 0 !== i.HTML5.valueMissing[t.tagName])
            return i.HTML5.valueMissing[t.tagName];
        } else if (t.validity.typeMismatch) {
          if (void 0 !== i.HTML5.typeMismatch[t.type])
            return i.HTML5.typeMismatch[t.type];
        } else if (t.validity.rangeOverflow) {
          if (void 0 !== i.HTML5.rangeOverflow[t.type]) {
            let e = t.getAttribute("max") ?? null;
            return (
              ("date" !== t.type && "month" !== t.type) ||
                (e = new Date(e).toLocaleDateString()),
              "week" === t.type && (e = "Week " + e.substr(6)),
              i.HTML5.rangeOverflow[t.type].sprintf(e)
            );
          }
        } else if (t.validity.rangeUnderflow) {
          if (void 0 !== i.HTML5.rangeUnderflow[t.type]) {
            let e = t.getAttribute("min") ?? null;
            return (
              ("date" !== t.type && "month" !== t.type) ||
                (e = new Date(e).toLocaleDateString()),
              "week" === t.type && (e = "Week " + e.substr(6)),
              i.HTML5.rangeUnderflow[t.type].sprintf(e)
            );
          }
        } else if (t.validity.stepMismatch) {
          if (void 0 !== i.HTML5.stepMismatch[t.type]) {
            let e = t.getAttribute("step") ?? null;
            return (
              ("date" !== t.type && "month" !== t.type) ||
                (e = new Date(e).toLocaleDateString()),
              "week" === t.type && (e = "Week " + e.substr(6)),
              i.HTML5.stepMismatch[t.type].sprintf(e, e)
            );
          }
        } else {
          if (t.validity.tooLong) {
            let a = t.getAttribute("maxlength") ?? null,
              n = e(t).val();
            return i.HTML5.tooLong.sprintf(a, n.length);
          }
          if (t.validity.tooShort) {
            let a = t.getAttribute("minlength") ?? null,
              n = e(t).val();
            return i.HTML5.tooShort.sprintf(a, n.length);
          }
          if (t.validity.patternMismatch) {
            if (p(t, "pattern") && p(t, "title")) return e(t).attr("title");
            let a = t.getAttribute("pattern") ?? null;
            return i.HTML5.patternMismatch.sprintf(a);
          }
          if (t.validity.badInput && void 0 !== i.HTML5.badInput[t.type])
            return i.HTML5.badInput[t.type];
        }
        return t.validationMessage ?? "";
      };
    function p(t, a, i = "") {
      let n = e(t).attr(a);
      if (void 0 !== n && !1 !== n) {
        if (!i) return !0;
        if (i === n) return !0;
      }
      return !1;
    }
    return (
      (String.prototype.sprintf = function () {
        for (var e = this.toString(), t = 0; t < arguments.length; t++) {
          var a = parseFloat(arguments[t]);
          if (a || 0 == a) {
            var i = a > 1 || 0 == a ? "s" : "";
            e = e.replace(/%s {1}(\w+)\(s\){1}/, "%s $1" + i);
          }
          e = e.replace("%s", arguments[t]);
        }
        return e;
      }),
      s(),
      {
        validator: f,
        errorTrigger: function (e, t) {
          "object" == typeof e && (e = e[0]),
            e.setCustomValidity(t),
            u(e, e.validationMessage);
        },
        reload: function () {
          s();
        },
        checkAll: r,
      }
    );
  };
})(jQuery);
