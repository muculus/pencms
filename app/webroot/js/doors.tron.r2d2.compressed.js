if (!dbugScripts("doors", ["doors.tron.r2d2.js"])) { /*	doors.tron.r2d2.js - packed	*/
    var ActivityMonitor = new Class({
        Implements: [Options, Events],
        options: {
            waitPeriod: 15 * 1000,
            inactivePeriod: 3 * 60 * 1000,
            events: ["scroll", "mousemove", "keypress", "click"],
            element: document
        },
        active: true,
        initialize: function (A) {
            this.setOptions(A);
            this.element = $(this.options.element);
            this.bindEvents();
            window.addEvent("domready", this.startMonitor.bind(this));
        },
        startMonitor: function () {
            this.setWaitPeriod();
            this.setPageEvents(this.bound.deactivateUser, false, "blur");
            this.setPageEvents(this.bound.reactivateUser, false, "focus");
        },
        stopMonitor: function () {
            if (this.waiting) {
                this.waiting = $clear(this.waiting);
            }
            if (this.testing) {
                this.testing = $clear(this.testing);
            }
            this.setPageEvents(this.bound.deactivateUser, "remove", "blur");
            this.setPageEvents(this.bound.reactivateUser, "remove", "focus");
            this.setPageEvents(this.bound.passTest, "remove");
            this.setPageEvents(this.bound.reactivateUser, "remove");
        },
        bindEvents: function () {
            var A = this.bound = {};
            A.passTest = this.passTest.bind(this);
            A.reactivateUser = this.reactivateUser.bind(this);
            A.deactivateUser = this.deactivateUser.bind(this);
        },
        passTest: function () {
            this.setPageEvents(this.bound.passTest, "remove");
            this.testing = $clear(this.testing);
            this.inactiveStart = null;
            this.setWaitPeriod();
        },
        failTest: function () {
            this.deactivateUser();
        },
        setWaitPeriod: function () {
            $clear(this.waiting);
            this.waiting = this.setTesting.delay(this.options.waitPeriod, this);
        },
        setTesting: function () {
            this.setPageEvents(this.bound.passTest);
            this.inactiveStart = $time();
            $clear(this.testing);
            this.testing = this.failTest.delay(this.options.inactivePeriod, this);
        },
        setPageEvents: function (C, A, B) {
            $splat(B || this.options.events).each(function (D) {
                this.element[((A) ? "remove" : "add") + "Event"](D, C);
            }, this);
        },
        deactivateUser: function () {
            this.waiting = $clear(this.waiting);
            this.testing = $clear(this.testing);
            if (this.active) {
                if (!this.inactiveStart) {
                    this.inactiveStart = $time();
                }
                this.active = false;
                this.setPageEvents(this.bound.reactivateUser);
                this.fireEvent("onDeactivate");
            }
        },
        reactivateUser: function () {
            if (!this.active) {
                this.active = true;
                this.setPageEvents(this.bound.reactivateUser, "remove");
                this.setWaitPeriod();
                this.fireEvent("onReactivate", (this.inactiveStart) ? ($time() - this.inactiveStart) : null);
                this.inactiveStart = null;
            }
        },
        isActive: function () {
            return !!this.active;
        },
        getInactiveTime: function () {
            var A = $time();
            if (this.active) {
                return 0;
            }
            return A - this.inactiveStart;
        }
    });
    ActivityMonitor.Scheduled = new Class({
        Implements: [Options, Events],
        options: {
            decay: null,
            startNow: true
        },
        initialize: function (B, C, A) {
            this.fn = B;
            this.monitor = ActivityMonitor.monitor || (ActivityMonitor.monitor = new ActivityMonitor());
            this.period = C;
            this.setOptions(A);
            this.setBound();
            if (this.options.startNow) {
                this.start();
            } else {
                this.resume();
            }
        },
        setBound: function () {
            var A = this.bound = {};
            A.reactivate = this.reactivate.bind(this);
            A.deactivate = this.deactivate.bind(this);
        },
        deactivate: function () {
            if (!this.options.decay) {
                this.delaying = $clear(this.delaying);
            }
        },
        reactivate: function (B) {
            var A;
            this.delaying = $clear(this.delaying);
            B = B || 0;
            A = $time();
            if ((A + B > this.scheduledUpdate)) {
                this.fireFunc();
            } else {
                this.delayedUpdate(this.scheduledUpdate - A);
            }
        },
        stop: function () {
            this.delaying = $clear(this.delaying);
            this.monitor.removeEvent("onReactivate", this.bound.reactivate);
            this.monitor.removeEvent("onDeactivate", this.bound.deactivate);
        },
        start: function () {
            this.resume(true);
            this.fireFunc();
        },
        resume: function (A) {
            this.monitor.addEvent("onReactivate", this.bound.reactivate);
            this.monitor.addEvent("onDeactivate", this.bound.deactivate);
            if (!A) {
                this.delayedUpdate();
            }
        },
        delayedUpdate: function (A) {
            A = A || this.period;
            this.scheduledUpdate = $time() + A;
            if (!this.monitor.isActive()) {
                if (this.options.decay) {
                    A = Math.max(this.options.decay * this.monitor.getInactiveTime(), this.period);
                } else {
                    return;
                }
            }
            this.delaying = this.fireFunc.delay(A, this);
        },
        fireFunc: function () {
            this.fn();
            this.delayedUpdate();
        }
    });
    Function.implement({
        scheduled: function (C, D, B) {
            if (this.scheduledJob) {
                if (["stop", "start", "resume"].contains(C)) {
                    this.scheduledJob[C];
                    return;
                }
            }
            B = B || {};
            var A = B.args;
            if (A) {
                delete B.args;
            }
            return this.scheduledJob = new ActivityMonitor.Scheduled(this.bind(D, A), C, B);
        }
    });
    ActivityMonitor.monitor = new ActivityMonitor();
    var LSSC;
    var LiveStreamStatusCheckR2D2 = new Class({
        Implements: [Options, Events],
        options: {
            intervalLength: 60000,
            promo$: "pcPromo",
            altPromo$: "",
            apiUrl: "http://api.cnet.com/restApi/v1.0/"
        },
        initialize: function (A) {
            this.setOptions(A);
            this.setPromoElems();
            this.setFranchiseIds();
            this.addRequestHandler();
            this.getLiveStatus.scheduled(this.options.intervalLength, this);
        },
        setPromoElems: function () {
            this.element = $(this.options.promo$);
            this.altPromo = $(this.options.altPromo$);
        },
        setFranchiseIds: function () {
            this.franchiseIds = (this.element.getProperty("franchiseids") || "").split(",");
        },
        displayPromo: function (C) {
            C = (C[0]) ? C[0] : null;
            if (C) {
                var B = "/9776-" + C.Category["@id"] + "_53-" + C["@id"] + ".html";
                this.element.empty();
                new Element("a", {
                    text: "Live now",
                    "class": "liveNow",
                    href: B
                }).inject(this.element);
                new Element("strong").adopt(new Element("a", {
                    href: B,
                    text: C.FranchiseName.$
                })).inject(this.element);
                var A = C.Description.$;
                if (!A.match(/dek/i)) {
                    new Element("p", {
                        text: C.Description.$
                    }).inject(this.element);
                }
                this.element.setStyle("display", "block");
                if (this.altPromo) {
                    this.altPromo.setStyle("display", "none");
                }
            } else {
                this.element.setStyle("display", "none");
                if (this.altPromo) {
                    this.altPromo.setStyle("display", "block");
                }
            }
        },
        addRequestHandler: function () {
            var A = LiveStreamStatusCheckR2D2.reqs.push(this) - 1;
            this.instanceName = this.options.instanceName || "lssc_" + A;
            LiveStreamStatusCheckR2D2.reqs[this.instanceName] = this;
        },
        getLiveStatus: function () {
            this.fetchData("videoSearch", "receiveLiveStatus", {
                videoIds: "",
                iod: "broadcast,lowcache",
                broadcastStatus: "IN_PROGRESS",
                orderBy: "broadcastStartTime",
                sortAsc: "true"
            });
        },
        receiveLiveStatus: function (A) {
            var B;
            this.clearScript();
            if (A && A.CNETResponse && A.CNETResponse.Videos) {
                B = $splat(A.CNETResponse.Videos.Video);
                B = B.filter(function (C) {
                    return !!(this.franchiseIds.contains(C.FranchiseId.$));
                }.bind(this));
            }
            this.displayPromo(B);
        },
        fetchData: function (B, E, D) {
            var C = {
                viewType: "json",
                partTag: "cntv",
                callback: "LiveStreamStatusCheckR2D2.reqs." + this.instanceName + "." + E
            },
                A = "?" + new Hash($merge(C, D || {})).toQueryString(),
                F = this.options.apiUrl + B + A;
            this.script = new Element("script", {
                type: "text/javascript",
                src: F
            }).inject(document.head);
            dbug.log("Script request: %s", F);
        },
        clearScript: function () {
            if ($type(this.script) == "element") {
                this.script.dispose();
            }
            this.script = null;
        }
    });
    LiveStreamStatusCheckR2D2.reqs = [];
    var Drag = new Class({
        Implements: [Events, Options],
        options: {
            snap: 6,
            unit: "px",
            grid: false,
            style: true,
            limit: false,
            handle: false,
            invert: false,
            preventDefault: false,
            modifiers: {
                x: "left",
                y: "top"
            }
        },
        initialize: function () {
            var B = Array.link(arguments, {
                options: Object.type,
                element: $defined
            });
            this.element = $(B.element);
            this.document = this.element.getDocument();
            this.setOptions(B.options || {});
            var A = $type(this.options.handle);
            this.handles = (A == "array" || A == "collection") ? $$(this.options.handle) : $(this.options.handle) || this.element;
            this.mouse = {
                now: {},
                pos: {}
            };
            this.value = {
                start: {},
                now: {}
            };
            this.selection = (Browser.Engine.trident) ? "selectstart" : "mousedown";
            this.bound = {
                start: this.start.bind(this),
                check: this.check.bind(this),
                drag: this.drag.bind(this),
                stop: this.stop.bind(this),
                cancel: this.cancel.bind(this),
                eventStop: $lambda(false)
            };
            this.attach();
        },
        attach: function () {
            this.handles.addEvent("mousedown", this.bound.start);
            return this;
        },
        detach: function () {
            this.handles.removeEvent("mousedown", this.bound.start);
            return this;
        },
        start: function (C) {
            if (this.options.preventDefault) {
                C.preventDefault();
            }
            this.fireEvent("beforeStart", this.element);
            this.mouse.start = C.page;
            var A = this.options.limit;
            this.limit = {
                x: [],
                y: []
            };
            for (var D in this.options.modifiers) {
                if (!this.options.modifiers[D]) {
                    continue;
                }
                if (this.options.style) {
                    this.value.now[D] = this.element.getStyle(this.options.modifiers[D]).toInt();
                } else {
                    this.value.now[D] = this.element[this.options.modifiers[D]];
                }
                if (this.options.invert) {
                    this.value.now[D] *= -1;
                }
                this.mouse.pos[D] = C.page[D] - this.value.now[D];
                if (A && A[D]) {
                    for (var B = 2; B--; B) {
                        if ($chk(A[D][B])) {
                            this.limit[D][B] = $lambda(A[D][B])();
                        }
                    }
                }
            }
            if ($type(this.options.grid) == "number") {
                this.options.grid = {
                    x: this.options.grid,
                    y: this.options.grid
                };
            }
            this.document.addEvents({
                mousemove: this.bound.check,
                mouseup: this.bound.cancel
            });
            this.document.addEvent(this.selection, this.bound.eventStop);
        },
        check: function (A) {
            if (this.options.preventDefault) {
                A.preventDefault();
            }
            var B = Math.round(Math.sqrt(Math.pow(A.page.x - this.mouse.start.x, 2) + Math.pow(A.page.y - this.mouse.start.y, 2)));
            if (B > this.options.snap) {
                this.cancel();
                this.document.addEvents({
                    mousemove: this.bound.drag,
                    mouseup: this.bound.stop
                });
                this.fireEvent("start", this.element).fireEvent("snap", this.element);
            }
        },
        drag: function (A) {
            if (this.options.preventDefault) {
                A.preventDefault();
            }
            this.mouse.now = A.page;
            for (var B in this.options.modifiers) {
                if (!this.options.modifiers[B]) {
                    continue;
                }
                this.value.now[B] = this.mouse.now[B] - this.mouse.pos[B];
                if (this.options.invert) {
                    this.value.now[B] *= -1;
                }
                if (this.options.limit && this.limit[B]) {
                    if ($chk(this.limit[B][1]) && (this.value.now[B] > this.limit[B][1])) {
                        this.value.now[B] = this.limit[B][1];
                    } else {
                        if ($chk(this.limit[B][0]) && (this.value.now[B] < this.limit[B][0])) {
                            this.value.now[B] = this.limit[B][0];
                        }
                    }
                }
                if (this.options.grid[B]) {
                    this.value.now[B] -= (this.value.now[B] % this.options.grid[B]);
                }
                if (this.options.style) {
                    this.element.setStyle(this.options.modifiers[B], this.value.now[B] + this.options.unit);
                } else {
                    this.element[this.options.modifiers[B]] = this.value.now[B];
                }
            }
            this.fireEvent("drag", this.element);
        },
        cancel: function (A) {
            this.document.removeEvent("mousemove", this.bound.check);
            this.document.removeEvent("mouseup", this.bound.cancel);
            if (A) {
                this.document.removeEvent(this.selection, this.bound.eventStop);
                this.fireEvent("cancel", this.element);
            }
        },
        stop: function (A) {
            this.document.removeEvent(this.selection, this.bound.eventStop);
            this.document.removeEvent("mousemove", this.bound.drag);
            this.document.removeEvent("mouseup", this.bound.stop);
            if (A) {
                this.fireEvent("complete", this.element);
            }
        }
    });
    Element.implement({
        makeResizable: function (A) {
            return new Drag(this, $merge({
                modifiers: {
                    x: "width",
                    y: "height"
                }
            }, A));
        }
    });
    Drag.Move = new Class({
        Extends: Drag,
        options: {
            droppables: [],
            container: false
        },
        initialize: function (C, B) {
            this.parent(C, B);
            this.droppables = $$(this.options.droppables);
            this.container = $(this.options.container);
            if (this.container && $type(this.container) != "element") {
                this.container = $(this.container.getDocument().body);
            }
            C = this.element;
            var D = C.getStyle("position");
            var A = (D != "static") ? D : "absolute";
            if (C.getStyle("left") == "auto" || C.getStyle("top") == "auto") {
                C.position(C.getPosition(C.offsetParent));
            }
            C.setStyle("position", A);
            this.addEvent("start", function () {
                this.checkDroppables();
            }, true);
        },
        start: function (B) {
            if (this.container) {
                var D = this.element,
                    J = this.container,
                    E = J.getCoordinates(D.offsetParent),
                    F = {},
                    A = {};
                ["top", "right", "bottom", "left"].each(function (K) {
                    F[K] = J.getStyle("padding-" + K).toInt();
                    A[K] = D.getStyle("margin-" + K).toInt();
                }, this);
                var C = D.offsetWidth + A.left + A.right,
                    I = D.offsetHeight + A.top + A.bottom;
                var H = [E.left + F.left, E.right - F.right - C];
                var G = [E.top + F.top, E.bottom - F.bottom - I];
                this.options.limit = {
                    x: H,
                    y: G
                };
            }
            this.parent(B);
        },
        checkAgainst: function (B) {
            B = B.getCoordinates();
            var A = this.mouse.now;
            return (A.x > B.left && A.x < B.right && A.y < B.bottom && A.y > B.top);
        },
        checkDroppables: function () {
            var A = this.droppables.filter(this.checkAgainst, this).getLast();
            if (this.overed != A) {
                if (this.overed) {
                    this.fireEvent("leave", [this.element, this.overed]);
                }
                if (A) {
                    this.overed = A;
                    this.fireEvent("enter", [this.element, A]);
                } else {
                    this.overed = null;
                }
            }
        },
        drag: function (A) {
            this.parent(A);
            if (this.droppables.length) {
                this.checkDroppables();
            }
        },
        stop: function (A) {
            this.checkDroppables();
            this.fireEvent("drop", [this.element, this.overed]);
            this.overed = null;
            return this.parent(A);
        }
    });
    Element.implement({
        makeDraggable: function (A) {
            return new Drag.Move(this, A);
        }
    });
    var StickyWinFx = new Class({
        Extends: StickyWin,
        options: {
            fade: true,
            fadeDuration: 150,
            draggable: false,
            dragOptions: {},
            dragHandleSelector: ".dragHandle",
            resizable: false,
            resizeOptions: {},
            resizeHandleSelector: ""
        },
        setContent: function (A) {
            this.parent(A);
            if (this.options.draggable) {
                this.makeDraggable();
            }
            if (this.options.resizable) {
                this.makeResizable();
            }
            return this;
        },
        hideWin: function () {
            if (this.options.fade) {
                this.fade(0);
            } else {
                this.parent();
            }
        },
        showWin: function () {
            if (this.options.fade) {
                this.fade(1);
            } else {
                this.parent();
            }
        },
        fade: function (B) {
            if (!this.fadeFx) {
                this.win.setStyles({
                    opacity: 0,
                    display: "block"
                });
                var A = {
                    property: "opacity",
                    duration: this.options.fadeDuration
                };
                if (this.options.fadeTransition) {
                    A.transition = this.options.fadeTransition;
                }
                this.fadeFx = new Fx.Tween(this.win, A);
            }
            if (B > 0) {
                this.win.setStyle("display", "block");
                this.position();
            }
            this.fadeFx.clearChain();
            this.fadeFx.start(B).chain(function () {
                if (B == 0) {
                    this.win.setStyle("display", "none");
                }
            }.bind(this));
            return this;
        },
        makeDraggable: function () {
            dbug.log("you must include Drag.js, cannot make draggable");
        },
        makeResizable: function () {
            dbug.log("you must include Drag.js, cannot make resizable");
        }
    });
    if (typeof Drag != "undefined") {
        StickyWinFx.implement({
            makeDraggable: function () {
                var C = this.toggleVisible(true);
                if (this.options.useIframeShim) {
                    this.makeIframeShim();
                    var B = (this.options.dragOptions.onComplete || $empty);
                    this.options.dragOptions.onComplete = function () {
                        B();
                        this.shim.position();
                    }.bind(this);
                }
                if (this.options.dragHandleSelector) {
                    var A = this.win.getElement(this.options.dragHandleSelector);
                    if (A) {
                        A.setStyle("cursor", "move");
                        this.options.dragOptions.handle = A;
                    }
                }
                this.win.makeDraggable(this.options.dragOptions);
                if (C) {
                    this.toggleVisible(false);
                }
            },
            makeResizable: function () {
                var C = this.toggleVisible(true);
                if (this.options.useIframeShim) {
                    this.makeIframeShim();
                    var B = (this.options.resizeOptions.onComplete || $empty);
                    this.options.resizeOptions.onComplete = function () {
                        B();
                        this.shim.position();
                    }.bind(this);
                }
                if (this.options.resizeHandleSelector) {
                    var A = this.win.getElement(this.options.resizeHandleSelector);
                    if (A) {
                        this.options.resizeOptions.handle = this.win.getElement(this.options.resizeHandleSelector);
                    }
                }
                this.win.makeResizable(this.options.resizeOptions);
                if (C) {
                    this.toggleVisible(false);
                }
            },
            toggleVisible: function (A) {
                if (!this.visible && Browser.Engine.webkit && $pick(A, true)) {
                    this.win.setStyles({
                        display: "block",
                        opacity: 0
                    });
                    return true;
                } else {
                    if (!$pick(A, false)) {
                        this.win.setStyles({
                            display: "none",
                            opacity: 1
                        });
                        return false;
                    }
                }
                return false;
            }
        });
    }
    if (window.PageVars && !PageVars.get("loadTime")) {
        PageVars.set("loadTime", $time());
    }
    var FrontDoorRiver = new Class({
        Implements: [Options, Events],
        options: {
            pageType: 8330,
            list$: "pe-socialMediaMain",
            getMore$: "ajaxMorePostings",
            refresh$: "refreshBar",
            storage$: "newContent",
            recentTab$: "recentTab",
            popularTab$: "popularTab",
            activity: "cnetRiverUpdater",
            period: 30000,
            params: {
                nomesh: true,
                noluke: true,
                activityname: "cnetRiverUpdater"
            }
        },
        initialize: function (B, A) {
            this.element = $(B);
            this.setOptions(A);
            this.monitor = CBSi.monitor || false;
            this.setRequestors();
            this.setElems();
            this.initTabs();
            this.initButtons("recent");
            this.initEntries();
            this.setTimestampUpdates(this.elems.list.getProperty("timestamp"));
            this.recentCheck = this.fetchData.scheduled(this.options.period, this, {
                args: "update",
                startNow: false,
                decay: 0.5
            });
        },
        setElems: function () {
            var A = this.options;
            this.elems = {
                list: $(A.list$),
                storage: $(A.storage$)
            };
            this.buttons = {
                getMore: $(A.getMore$),
                refresh: $(A.refresh$)
            };
            if (Browser.Engine.trident) {
                this.buttons.refresh.set("reveal", {
                    onComplete: this.elems.list.toggleClass.bind(this.elems.list, "ieredraw")
                });
            }
            this.tabs = {
                getRecent: $(A.recentTab$),
                getPopular: $(A.popularTab$)
            };
            if (this.tabs.getRecent) {
                this.tabs.container = this.tabs.getRecent.getParent("ul");
            }
        },
        initTabs: function () {
            if (this.tabs.getRecent) {
                this.tabs.getRecent.addEvent("click", function (A) {
                    A.stop();
                    if (!this.tabs.getRecent.hasClass("active")) {
                        new Jlogger({
                            cval: "cnetRiver;latestSort",
                            ctype: "testevent;click"
                        }).ping();
                        this.resetRiver("recent");
                    }
                }.bind(this));
            }
            if (this.tabs.getPopular) {
                this.tabs.getPopular.addEvent("click", function (A) {
                    A.stop();
                    if (!this.tabs.getPopular.hasClass("active")) {
                        new Jlogger({
                            cval: "cnetRiver;trendSort",
                            ctype: "testevent;click"
                        }).ping();
                        this.resetRiver("popular");
                    }
                }.bind(this));
            }
        },
        setRequestors: function () {
            this.updater = new Request({
                url: PageVars.getPath({
                    pageType: this.options.pageType
                }),
                method: "get",
                onSuccess: this.updateRecentPostings.bind(this)
            });
            this.updater.riverType = "update";
            this.requestor = new Request({
                url: PageVars.getPath({
                    pageType: this.options.pageType
                }),
                method: "get",
                onRequest: function () {
                    if (!["update", "more"].contains(this.requestor.riverType)) {
                        this.elems.list.tween("opacity", 0.5);
                        new Element("li", {
                            "class": "loading"
                        }).inject(this.tabs.container);
                    } else {
                        if (this.requestor.riverType == "more") {
                            this.buttons.getMore.getElement(".viewMore").addClass("loading");
                        }
                    }
                }.bind(this),
                onComplete: function () {
                    var A;
                    if (!["update", "more"].contains(this.requestor.riverType)) {
                        A = this.tabs.container.getElement(".loading");
                        if (A) {
                            A.destroy();
                        }
                        this.elems.list.tween("opacity", 1);
                    } else {
                        if (this.requestor.riverType == "more") {
                            A = this.buttons.getMore.getElement(".loading");
                            if (A) {
                                A.removeClass("loading");
                            }
                        }
                    }
                }.bind(this),
                onSuccess: this.parseEntries.bind(this),
                autoCancel: true
            });
        },
        fetchData: function (B) {
            var A = (B == "update") ? this.updater : this.requestor;
            A.riverType = B;
            A.send({
                data: this.getParams(B)
            });
        },
        getParams: function (A) {
            var B = {};
            switch (A) {
            case "update":
                B = $merge(B, {
                    begin: this.getDateLandmark(this.elems.list.getElement(".riverPost").getProperty("date"))
                });
                break;
            case "more":
                B = $merge(B, {
                    end: this.getDateLandmark(this.elems.list.getElements(".riverPost").getLast().getProperty("date"), "previous")
                });
                break;
            case "popular":
                B = $merge(B, {
                    queryType: "juciCombinedSearch",
                    orderBy: "socialScore~desc",
                    minSocialScore: 1,
                    limit: 100
                });
            case "recent":
                B = $merge(B, {
                    uniqueId: this.getRoundedUpdateId(2)
                });
            }
            return $merge(this.options.params, B);
        },
        getRoundedUpdateId: function (A) {
            var B = Math.floor($time() / 10000);
            return Math.floor(B - B % ((A || 1) * 6));
        },
        getDateLandmark: function (C, B) {
            var A = this.getDateFromTimestamp(C),
                D = 1000 * ((B == "previous") ? -1 : 1);
            A.setTime(A.getTime() + D);
            return this.getTimestampFromDate(A);
        },
        parseEntries: function (C, A) {
            var B = this.getDataFromResponse(A);
            switch (this.requestor.riverType) {
            case "recent":
                this.loadRecentPostings(B);
                break;
            case "popular":
                this.loadPopular(B);
                break;
            case "more":
                this.updateMorePostings(B);
                break;
            }
        },
        getDataFromResponse: function (B) {
            var E = {},
                A = B.getElementsByTagName("pageElement"),
                D = 0,
                C, F;
            for (D; D < A.length; D++) {
                C = A[D].getElementsByTagName("name")[0].firstChild.nodeValue;
                F = A[D].getElementsByTagName("html")[0].firstChild.nodeValue;
                switch (C) {
                case ".socialMediaMain":
                    E.html = new Element("div", {
                        html: F
                    }).getChildren();
                    break;
                case ".riverCounter":
                    E.count = F.toInt();
                    break;
                case ".timestamp":
                    E.timestamp = F;
                    break;
                default:
                    E[C] = F;
                }
            }
            return E;
        },
        loadPopular: function (A) {
            this.elems.list.empty().addClass("trendingList");
            A.html.each(function (C, B) {
                if (B >= 25) {
                    C.addClass("hidden").setStyle("display", "none");
                }
                C.inject(this.elems.list);
            }, this);
            this.initEntries();
        },
        loadRecentPostings: function (A) {
            this.elems.list.empty().removeClass("trendingList");
            A.html.each(this.elems.list.adopt.bind(this.elems.list));
            this.initEntries();
        },
        updateRecentPostings: function (D, A) {
            var C = this.getDataFromResponse(A),
                B;
            if (C.count != this.lastCount) {
                if (C.html.length) {
                    this.elems.storage.empty();
                    C.html.each(this.elems.storage.adopt.bind(this.elems.storage));
                    B = this.buttons.refresh.get("html");
                    if (C.count == 1) {
                        B = B.replace("are", "is").replace("posts.", "post.").replace("postings.", "post.");
                    } else {
                        B = B.replace("is", "are").replace(/postings*\./, "posts.").replace("post.", "posts.");
                    }
                    this.buttons.refresh.set("html", B);
                    this.buttons.refresh.getElement("span").set("text", C.count);
                    this.buttons.refresh.reveal();
                }
                this.lastCount = C.count;
            }
        },
        updateMorePostings: function (B) {
            var A = new Element("ul", {
                styles: {
                    display: "none"
                }
            }).inject(this.element);
            B.html.each(A.adopt.bind(A));
            if (Browser.Engine.trident) {
                B.html[0].set("tween", {
                    onComplete: this.elems.list.toggleClass.bind(this.elems.list, "ieredraw")
                });
            }
            this.initEntries(A);
            B.html.each(function (C) {
                C.setStyle("opacity", 0).inject(this.elems.list).tween("opacity", 1);
            }, this);
            A.destroy();
        },
        refreshRecentPostings: function () {
            var A = $A(this.elems.storage.getChildren()),
                B;
            this.initEntries(this.elems.storage);
            this.buttons.refresh.dissolve();
            this.lastCount = 0;
            while (B = A.pop()) {
                B.setStyle("opacity", 0).inject(this.elems.list, "top").tween("opacity", 1);
            }
            new Jlogger({
                cval: "cnetRiver;refresh",
                ctype: "testevent;click"
            }).ping();
        },
        initEntries: function (A) {
            A = A || this.elems.list;
            this.initVideos(A);
            this.initShare(A);
            A.getElements(".assetThumb img").each(function (B) {
                if (!B.getProperty("src")) {
                    B.getParent(".assetThumb").dispose();
                }
            });
            A.getElements(".assetRatings a").removeProperty("href");
        },
        resetRiver: function (A) {
            this.elems.storage.empty();
            if (A == "popular") {
                this.fetchData("popular");
                this.tabs.getPopular.addClass("active");
                this.tabs.getRecent.removeClass("active");
                this.recentCheck.stop();
            } else {
                if (A == "recent") {
                    this.fetchData("recent");
                    this.tabs.getRecent.addClass("active");
                    this.tabs.getPopular.removeClass("active");
                    this.recentCheck.resume();
                }
            }
            this.initButtons(A);
        },
        initButtons: function (A) {
            A = A || "recent";
            if (!this.buttons.getMore.getElement(".viewMore")) {
                this.buttons.getMore.set("html", '<span class="viewMore">' + this.buttons.getMore.get("text") + "</span>");
            }
            this.buttons.getMore.setStyle("display", "block").removeEvents("click");
            this.buttons.refresh.setStyle("display", "none").removeEvents("click");
            if (A == "recent") {
                this.buttons.refresh.addEvent("click", this.refreshRecentPostings.bind(this));
                this.buttons.getMore.addEvent("click", function () {
                    this.fetchData("more");
                    new Jlogger({
                        cval: "cnetRiver;viewMore-latest",
                        ctype: "testevent;click"
                    }).ping();
                }.bind(this));
            } else {
                if (A == "popular") {
                    this.buttons.getMore.addEvent("click", function () {
                        this.showMorePopular();
                        new Jlogger({
                            cval: "cnetRiver;viewMore-trend",
                            ctype: "testevent;click"
                        }).ping();
                    }.bind(this));
                }
            }
        },
        showMorePopular: function () {
            var A = this.elems.list.getElements(".riverPost.hidden");
            for (var B = 0; B < 25 && A[B]; B++) {
                A[B].removeClass("hidden").setStyles({
                    opacity: 0,
                    display: "block"
                }).tween("opacity", 1);
            }
            if (!A[B]) {
                this.buttons.getMore.dissolve();
            }
        },
        initShare: function (A) {
            A = A || this.elems.list;
            A.getElements(".shareIco").removeProperty("href");
            $$(".shareIco").each(function (C) {
                C.addClass("anchorLeft");
                if (C.retrieve("shareShell")) {
                    return false;
                }
                var B = C.getParent(".riverPost");
                var D = $merge(PageVars.data.getClean(), {
                    shareURL: B.getElement(".assetHed a").getProperty("href"),
                    shareTitle: B.getElement(".assetHed a").get("text"),
                    shareDescription: B.getElement(".assetBody>p").get("text")
                });
                new PageTools.ShareShell(C, D);
            });
        },
        initVideos: function (A) {
            A = A || this.elems.list;
            A.getElements(".videoLauncher").each(function (E) {
                var C = E.getParent("li"),
                    F = C.retrieve("riverVideo:launcher"),
                    B, D;
                if (!F) {
                    C.addClass("videoPost");
                    F = function () {
                        var G = new Element("div", {
                            "class": "productVideo"
                        }).inject(C);
                        new Element("a", {
                            "class": "dragHandle",
                            text: "drag"
                        }).inject(G);
                        new Element("a", {
                            "class": "closeVideo closeSticky",
                            text: "Close"
                        }).inject(G);
                        new Element("div", {
                            "class": "vidShell"
                        }).inject(G);
                        (function () {
                            loadGeckoVideoPlayer({
                                parentElement: C.getElement(".vidShell"),
                                flashVars: {
                                    contentType: "id",
                                    contentValue: E.getProperty("videoId")
                                }
                            }, "feature");
                            B = new StickyWinFx({
                                draggable: true,
                                content: G,
                                relativeTo: E,
                                position: "upperLeft",
                                onClose: function () {
                                    this.win.destroy();
                                    C.store("riverVideo:stickywin", null);
                                }
                            });
                            C.store("riverVideo:stickywin", B);
                            if (Browser.Engine.trident) {
                                D = getElementCoordinates(E);
                                B.win.setStyles({
                                    top: D.top,
                                    left: D.left
                                });
                            }
                        }).lazy(window.GeckoVideoPlayer, CBSi.lazy.videoPlayer);
                    };
                    C.store("riverVideo:launcher", F);
                }
                E.addEvent("click", function () {
                    if (!C.retrieve("riverVideo:stickywin")) {
                        C.retrieve("riverVideo:launcher")();
                    }
                });
            });
        },
        getDateFromTimestamp: function (A) {
            A = A.match(/(\d{4})(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/);
            if (!A) {
                return;
            }
            return (new Date(A[1], A[2].toInt() - 1, A[3], A[4], A[5], A[6]) || null);
        },
        zeroFill: function (A, B) {
            B = B || 2;
            A = A.toString();
            while (A.length < B) {
                A = "0" + A;
            }
            return A;
        },
        getTimestampFromDate: function (A) {
            var C = "",
                B = this.zeroFill;
            if (!A || !$type(A) == "date") {
                return C;
            }
            C = A.getFullYear().toString() + B(A.getMonth() + 1) + B(A.getDate()) + B(A.getHours()) + B(A.getMinutes()) + B(A.getSeconds());
            return C;
        },
        getAgoDate: function (B, C) {
            var D = Math.round((B - C) / 1000),
                F, A, E;
            if (D < 60) {
                A = D;
                F = "second";
            } else {
                if (D < 60 * 60) {
                    A = Math.floor(D / 60);
                    F = "minute";
                } else {
                    if (D < 60 * 60 * 24) {
                        A = Math.floor(D / (60 * 60));
                        F = "hour";
                    } else {
                        if (D < 60 * 60 * 24 * 7) {
                            A = Math.floor(D / (60 * 60 * 24));
                            F = "day";
                        } else {
                            A = Math.floor(D / (60 * 60 * 24 * 7));
                            F = "week";
                        }
                    }
                }
            }
            E = A + " " + F + ((A > 1) ? "s" : "") + " ago";
            return E;
        },
        setTimestampUpdates: function (A) {
            if (!A) {
                return;
            }
            this.timestampOffset = (PageVars.get("loadTime") || $time()) - this.getDateFromTimestamp(A);
            this.timestamper = this.updateTimestamps.scheduled(60000, this);
        },
        updateTimestamps: function () {
            var A = $time() - this.timestampOffset;
            this.element.getElements("li.riverPost").each(function (B) {
                B.getElement(".assetTime").set("text", this.getAgoDate(A, this.getDateFromTimestamp(B.getProperty("date"))));
            }, this);
        }
    });
    var CBSCarousel = new Class({
        Implements: [Options, Events],
        options: {
            slide$$: "li.carouselSlide",
            slideInterval: 6000,
            transitionDuration: "short",
            startIndex: 0,
            indicatorActiveClass: "selected",
            indicatorInactiveClass: "off",
            indicatorDisplayStart: 0,
            rotateAction: "mouseenter",
            rotateActionDuration: 100,
            autoplay: true,
            useIndicators: true,
            indicatorContainerClass: "indicators",
            indicator$$: null,
            nextButtonClass: "carouselNext",
            prevButtonClass: "carouselPrev",
            pauseOnHover: true,
            pauseOnBlur: true
        },
        initialize: function (A, B) {
            A = $(A);
            if (A.retrieve("carousel")) {
                return false;
            }
            this.container = A;
            this.container.store("carousel", this);
            this.setOptions(B);
            this.slides = this.setSlides();
            if (this.options.useIndicators) {
                this.setIndicators();
            }
            this.showSlide(this.options.startIndex);
            this.setButtons();
            if (this.options.pauseOnHover && this.options.autoplay) {
                this.setHoverPausing();
            }
            if (this.options.pauseOnBlur && this.options.autoplay) {
                this.setWindowPausing();
            }
            if (this.options.autoplay) {
                this.autoplay();
            }
            this.fireEvent("onInitialize");
            return this;
        },
        setHoverPausing: function () {
            this.setBindings();
            this.container.addEvents({
                mouseenter: this.bound.stop,
                mouseleave: this.bound.autoplay
            });
            this.addEvent("onActiveSelect", this.bound.clearPausing);
        },
        setWindowPausing: function () {
            if (!this.bound) {
                this.setBindings();
            }
            window.addEvents({
                blur: this.bound.stop,
                focus: this.bound.autoplay
            });
        },
        clearPausing: function () {
            this.container.removeEvent("mouseenter", this.bound.stop);
            this.container.removeEvent("mouseleave", this.bound.autoplay);
            window.removeEvent("blur", this.bound.stop);
            window.removeEvent("focus", this.bound.autoplay);
            this.removeEvent("onActiveSelect", this.bound.clearPausing);
        },
        setBindings: function () {
            this.bound = {
                autoplay: this.autoplay.bind(this),
                stop: this.stop.bind(this),
                clearPausing: this.clearPausing.bind(this)
            };
        },
        setSlides: function () {
            slides = this.container.getElements(this.options.slide$$);
            slides.each(function (A, B) {
                A.set("tween", {
                    duration: this.options.transitionDuration,
                    onStart: function () {
                        if (A.getStyle("opacity") < 0.1) {
                            A.setStyle("display", "block");
                        }
                    },
                    onComplete: function () {
                        if (A.getStyle("opacity") < 1) {
                            A.setStyle("display", "none");
                        }
                    }
                });
                A.setStyles({
                    display: (B == this.options.startIndex) ? "block" : "none",
                    opacity: (B == this.options.startIndex) ? 1 : 0
                });
            }.bind(this));
            return slides;
        },
        setIndicators: function () {
            this.indicators = (this.options.indicator$$) ? this.container.getElements(this.options.indicator$$) : this.createIndicators();
            this.indicators.each(function (A, B) {
                A.addEvent(this.options.rotateAction, this.activeSelect.bind(this, B));
            }, this);
        },
        createIndicators: function () {
            var C = this.options,
                A = new Element("ul", {
                    "class": C.indicatorContainerClass
                }).inject(this.container);
            var D = [];
            for (var B = 0; B < this.slides.length; B++) {
                D.push(new Element("li", {
                    text: B + (C.indicatorDisplayStart || 0)
                }).inject(A));
            }
            return D;
        },
        setButtons: function () {
            this.container.getElements("." + this.options.nextButtonClass).removeProperties("onclick", "href").addEvent("click", this.activeSelect.bind(this, "next"));
            this.container.getElements("." + this.options.prevButtonClass).removeProperties("onclick", "href").addEvent("click", this.activeSelect.bind(this, "prev"));
        },
        activeSelect: function (A) {
            if ($type(A) != "number") {
                A = this.getToIndex(A);
            }
            if (this.slideshowInt) {
                this.stop();
            }
            this.showSlide(A);
            this.fireEvent("onActiveSelect");
        },
        getToIndex: function (A) {
            if (A == "next") {
                return (this.currentIndex == this.slides.length - 1) ? 0 : this.currentIndex + 1;
            }
            return ((this.currentIndex == 0) ? this.slides.length : this.currentIndex) - 1;
        },
        showSlide: function (A) {
            if (A == this.currentIndex) {
                return this;
            }
            $each(this.slides, function (B, C) {
                if (C == A) {
                    if (this.options.useIndicators) {
                        this.indicators[C].swapClass(this.options.indicatorInactiveClass, this.options.indicatorActiveClass);
                    }
                    B.fade("in");
                } else {
                    if (this.options.useIndicators) {
                        this.indicators[C].swapClass(this.options.indicatorActiveClass, this.options.indicatorInactiveClass);
                    }
                    B.fade("out");
                }
            }.bind(this));
            this.fireEvent("onShowSlide", [A, this.currentIndex]);
            this.currentIndex = A;
            return this;
        },
        autoplay: function () {
            if (this.slideshowInt) {
                return this;
            }
            this.slideshowInt = this.rotate.periodical(this.options.slideInterval, this);
            this.fireEvent("onAutoPlay");
            return this;
        },
        stop: function () {
            this.slideshowInt = $clear(this.slideshowInt);
            this.fireEvent("onStop");
            return this;
        },
        rotate: function () {
            var B = this.currentIndex;
            var A = (B + 1 >= this.slides.length) ? 0 : B + 1;
            this.showSlide(A);
            this.fireEvent("onRotate", [A, B]);
            return this;
        },
        toElement: function () {
            return this.container;
        }
    });
    if (!window.GeckoVideoPlayer) {
        var GeckoVideoPlayer = {};
        GeckoVideoPlayer.manager = {
            playerIds: [],
            players: [],
            getId: function () {
                return this.addPlayerId("player" + this.playerIds.length);
            },
            addPlayerId: function (A) {
                return this.playerIds[this.playerIds.push(A) - 1];
            },
            addPlayer: function (A) {
                return this.players[this.players.push(A) - 1];
            }
        };
        GeckoVideoPlayer.presets = {
            cnetTv: {
                params: {
                    bgcolor: "#000000",
                    wMode: "opaque"
                },
                flashVars: {
                    vidWidth: 512,
                    vidHeight: 288,
                    playerWidth: 812,
                    playerHeight: 300,
                    playlistDisplay: "right",
                    playlistWidth: 300,
                    playlistHeight: 300,
                    playlistType: "node",
                    controlsDisplay: "over",
                    bbuttonDisplay: "none",
                    autoplay: true,
                    playlistShowDate: true,
                    shareUrl: null,
                    adInterval: 2,
                    overlayInterval: 1,
                    adPreroll: "false",
                    adPostFirstVideo: "true",
                    adPostFirstVideoType: "PreContent",
                    adPostroll: "false",
                    refreshMpuEnabled: true
                }
            },
            cnetLive: {
                params: {
                    bgcolor: "#666666",
                    wMode: "transparent"
                },
                flashVars: {
                    vidWidth: 460,
                    vidHeight: 259,
                    playerWidth: 460,
                    playerHeight: 310,
                    playlistType: "node",
                    controlsDisplay: "below",
                    bbuttonDisplay: "auto",
                    autoplay: "true",
                    playlistShowDate: "true",
                    adInterval: 2,
                    overlayInterval: 1,
                    adPreroll: "true",
                    refreshMpuEnabled: true
                }
            },
            feature: {
                params: {
                    bgcolor: "#666666",
                    wMode: "transparent"
                },
                flashVars: {
                    vidWidth: 364,
                    vidHeight: 205,
                    playerWidth: 364,
                    playerHeight: 254,
                    playlistDisplay: "none",
                    controlsDisplay: "below",
                    bbuttonDisplay: "auto",
                    autoplay: "true",
                    shareUrl: null,
                    adInterval: 1,
                    overlayInterval: 1,
                    adPreroll: "true",
                    adPostroll: "true"
                }
            },
            review4505: {
                params: {
                    bgcolor: "#666666",
                    wMode: "transparent"
                },
                flashVars: {
                    vidWidth: 460,
                    vidHeight: 259,
                    playerWidth: 460,
                    playerHeight: 310,
                    playlistType: "morelikethis",
                    playlistDisplay: "over",
                    controlsDisplay: "below",
                    bbuttonDisplay: "auto",
                    autoplay: "false",
                    adInterval: 2,
                    overlayInterval: 0,
                    adPreroll: "true",
                    adPostFirstVideo: "true",
                    adPostroll: "true"
                }
            },
            news: {
                params: {
                    bgcolor: "#666666",
                    wMode: "transparent"
                },
                flashVars: {
                    vidWidth: 460,
                    vidHeight: 259,
                    playerWidth: 460,
                    playerHeight: 310,
                    playlistDisplay: "none",
                    controlsDisplay: "below",
                    bbuttonDisplay: "auto",
                    autoplay: "true",
                    adInterval: 1,
                    overlayInterval: 0,
                    adPreroll: "true",
                    adPostroll: "false"
                }
            },
            download: {
                params: {
                    bgcolor: "#666666",
                    wMode: "transparent"
                },
                flashVars: {
                    playerWidth: 512,
                    playerHeight: 337,
                    vidWidth: 512,
                    vidHeight: 288,
                    autoplay: "false",
                    playlistType: "none",
                    playlistDisplay: "none",
                    controlsDisplay: "below",
                    bbuttonDisplay: "auto",
                    adInterval: 2,
                    overlayInterval: 0,
                    adTargetType: "PostContent",
                    adPreroll: "true",
                    adPrerollType: "Page",
                    adPostroll: "true",
                    adTarget: "Page"
                }
            },
            blogXlarge: {
                params: {
                    bgcolor: "#666666",
                    wMode: "transparent"
                },
                flashVars: {
                    vidWidth: 900,
                    vidHeight: 506,
                    playerWidth: 900,
                    playerHeight: 555,
                    playlistDisplay: "over",
                    playlistType: "morelikethis",
                    controlsDisplay: "below",
                    bbuttonDisplay: "auto",
                    autoplay: "true",
                    adInterval: 1,
                    overlayInterval: 0,
                    adPreroll: "true",
                    adPostroll: "true",
                    adPostFirstVideo: "true"
                }
            },
            blogLarge: {
                params: {
                    bgcolor: "#666666",
                    wMode: "transparent"
                },
                flashVars: {
                    vidWidth: 604,
                    vidHeight: 340,
                    playerWidth: 604,
                    playerHeight: 389,
                    playlistDisplay: "over",
                    playlistType: "morelikethis",
                    controlsDisplay: "below",
                    bbuttonDisplay: "auto",
                    autoplay: "true",
                    adInterval: 1,
                    overlayInterval: 0,
                    adPreroll: "true",
                    adPostroll: "true",
                    adPostFirstVideo: "true"
                }
            },
            blogMedium: {
                params: {
                    bgcolor: "#666666",
                    wMode: "transparent"
                },
                flashVars: {
                    vidWidth: 512,
                    vidHeight: 288,
                    playerWidth: 512,
                    playerHeight: 337,
                    playlistDisplay: "over",
                    playlistType: "morelikethis",
                    controlsDisplay: "below",
                    bbuttonDisplay: "auto",
                    autoplay: "true",
                    adInterval: 1,
                    overlayInterval: 0,
                    adPreroll: "true",
                    adPostroll: "true",
                    adPostFirstVideo: "true"
                }
            },
            blogSmall: {
                params: {
                    bgcolor: "#666666",
                    wMode: "transparent"
                },
                flashVars: {
                    vidWidth: 460,
                    vidHeight: 259,
                    playerWidth: 460,
                    playerHeight: 308,
                    playlistDisplay: "over",
                    playlistType: "morelikethis",
                    controlsDisplay: "below",
                    bbuttonDisplay: "auto",
                    autoplay: "true",
                    adInterval: 1,
                    overlayInterval: 0,
                    adPreroll: "true",
                    adPostroll: "true",
                    adPostFirstVideo: "true"
                }
            },
            blogXsmall: {
                params: {
                    bgcolor: "#666666",
                    wMode: "transparent"
                },
                flashVars: {
                    vidWidth: 386,
                    vidHeight: 217,
                    playerWidth: 386,
                    playerHeight: 266,
                    playlistDisplay: "over",
                    playlistType: "morelikethis",
                    controlsDisplay: "below",
                    bbuttonDisplay: "auto",
                    autoplay: "true",
                    adInterval: 1,
                    overlayInterval: 0,
                    adPreroll: "true",
                    adPostroll: "true",
                    adPostFirstVideo: "true"
                }
            },
            mobileFlash: {
                swfPath: "http://cnettv.cnet.com/av/video/mobileFlash/20100806/player.swf",
                params: {
                    bgcolor: "#000000",
                    wMode: "window"
                },
                flashVars: {
                    vidWidth: 585,
                    vidHeight: 329,
                    playerWidth: 585,
                    playerHeight: (329 + 55),
                    subEnabled: "false",
                    dlEnabled: "false",
                    shareEnabled: "false",
                    ccEnabled: "true",
                    hdEnabled: "true",
                    fsEnabled: "true",
                    volEnabled: "false",
                    controlsDisplay: "over",
                    bbuttonDisplay: "manual",
                    autoplay: "false",
                    playlistShowDate: "true",
                    adInterval: 2,
                    adPreroll: "false"
                }
            },
            googleTv: {
                swfPath: "http://cnettv.cnet.com/av/video/googleTv/player.swf",
                params: {
                    bgcolor: "#000000",
                    wMode: "window"
                },
                flashVars: {
                    vidWidth: 1280,
                    vidHeight: 720,
                    playerWidth: 1280,
                    playerHeight: 720,
                    subEnabled: "false",
                    dlEnabled: "false",
                    shareEnabled: "false",
                    ccEnabled: "true",
                    hdEnabled: "true",
                    fsEnabled: "true",
                    volEnabled: "false",
                    controlsDisplay: "over",
                    bbuttonDisplay: "manual",
                    autoplay: "true",
                    playlistShowDate: "false",
                    adInterval: 0,
                    adPreroll: "false"
                }
            },
            global: {
                swfPath: "http://i.d.com.com/av/video/cnettv/4/20100927/player.swf",
                adEngine: "madison",
                adHost: (function () {
                    var A = document.domain;
                    if (A.contains(".com:") == true || A.contains(".uat.") == true) {
                        return "http://madstage.cnettv.com/";
                    } else {
                        return "http://mads.cnettv.com/";
                    }
                })(),
                flashVars: {
                    shareUrl: "http://" + document.location.host + document.location.pathname
                }
            }
        };
        var loadGeckoVideoPlayer = function (A, C) {
            dbug.log(" ---> loadGeckoVideoPlayer preset: " + C);
            if (C) {
                if ($type(C) == "string") {
                    C = GeckoVideoPlayer.presets[C];
                }
                A = $merge(GeckoVideoPlayer.presets.global, C, A);
            } else {
                A = $merge(GeckoVideoPlayer.presets.global, A);
            }
            if (document.location.search.contains("autoplay=true")) {
                A = $merge((A || {}), {
                    autoPlay: (document.location.search.contains("autoplay=true"))
                });
            }
            var B = function (D) {
                dbug.log(" ---> setPlayer: options: %o", D);
                GeckoVideoPlayer.manager.addPlayer(new GeckoVideoPlayer.Player(D));
            };
            if (A.parentElement) {
                GeckoVideoPlayer.manager.players.push(A.parentElement);
                if ($(A.parentElement)) {
                    B(A);
                } else {
                    window.addEvent("domready", B(A));
                }
            } else {
                A.parentElement = GeckoVideoPlayer.manager.getId();
                document.write('<div id="' + A.parentElement + '"></div>');
                B(A);
            }
        };
        GeckoVideoPlayer.Player = new Class({
            Implements: Options,
            options: {
                parentElement: "",
                initObject: window,
                initAction: "load",
                swfPath: "",
                adEngine: "",
                adHost: "",
                params: {
                    wmode: "opaque",
                    bgcolor: "#EDEDED",
                    scale: "noscale",
                    salign: "lt",
                    swLiveConnect: "true",
                    allowScriptAccess: "always",
                    allowFullScreen: "true"
                },
                flashVars: {
                    si: PageVars.get("siteId"),
                    br: PageVars.get("brandId"),
                    ip: PageVars.get("userIP"),
                    ua: escape(navigator.userAgent),
                    cid: PageVars.get("assetId"),
                    oid: PageVars.getOid(),
                    edid: PageVars.get("editionId"),
                    nd: PageVars.get("nodeId"),
                    pt: PageVars.get("pageType"),
                    ncat: PageVars.get("breadcrumb"),
                    chid: PageVars.get("channelId"),
                    ddom: Browser.getHost(),
                    guid: PageVars.get("guid"),
                    dvarMfg: "",
                    autoplay: false,
                    playerType: null,
                    playerBrand: null,
                    apiHostname: null,
                    apiVersion: null,
                    cms: null,
                    name: null,
                    type: null,
                    value: null,
                    playlistType: null,
                    playlistValue: null,
                    playerWidth: 512,
                    playerHeight: 337,
                    vidWidth: 512,
                    vidHeight: 288,
                    playlistDisplay: "over",
                    playlistWidth: null,
                    playlistHeight: null,
                    playlistShowDate: null,
                    ccEnabled: true,
                    hdEnabled: true,
                    fsEnabled: true,
                    shareEnabled: true,
                    dlEnabled: true,
                    subEnabled: true,
                    controlsDisplay: "below",
                    bbuttonDisplay: "auto",
                    playOverlayText: "PLAY CNET VIDEO",
                    startVolume: (Cookie.get("userVolume") != null) ? Cookie.get("userVolume") : 30,
                    adCallTemplate: "",
                    adInterval: 2,
                    adTargetType: "",
                    adTargetValue: null,
                    adPreroll: false,
                    adPrerollType: "",
                    adPrerollValue: null,
                    adPostroll: true,
                    adPostrollType: "",
                    adPostrollValue: null,
                    adPostFirstVideo: false,
                    adPostFirstVideoType: "",
                    adPostFirstVideoValue: null,
                    refreshMpuEnabled: false,
                    madHost: null,
                    uvpc: "",
                    customTrackVars: ""
                }
            },
            initialize: function (A) {
                this.setOptions(A);
                this.processPlayerData();
                this.setAdCallTemplate();
                this.validateFlashVars();
                this.setUvpcPath();
                this.createPlayer();
            },
            setAdCallTemplate: function () {
                var A = this.options.adHost;
                if (this.options.adEngine == "dart") {
                    A += "can/news/";
                    A += "{%videoNode};";
                    A += "site=news;";
                    A += "show={%videoNode};";
                    A += "feat={%videoNode};";
                    A += "{%videoFeatPath}";
                    A += "partner=news;";
                    A += "lvid={%videoId};";
                    A += "outlet=CBS+Production;";
                    A += "noAd={%videoNoAd};";
                    A += "type=ros;";
                    A += "format=FLV;";
                    A += "pos={%posDart};";
                    A += "sz=320x240;";
                    A += "ord={%random};";
                } else {
                    A += "mac-ad";
                    A += "?UA=" + escape(navigator.userAgent);
                    A += "&REMOTE_ADDR=" + this.options.flashVars.ip;
                    A += "&BRAND=" + this.options.flashVars.br;
                    A += "&SITE=" + this.options.flashVars.si;
                    A += "&PTYPE={%pType}";
                    A += "&DVAR_VERSION=2008";
                    A += "&CNET-PAGE-GUID=" + this.options.flashVars.guid;
                    A += "&DVAR_MFG=" + this.options.flashVars.dvarMfg;
                    A += "&COOKIE:ANON_ID=" + Cookie.get("XCLGFbrowser");
                    A += "&NCAT={%videoNodePath}";
                    A += "&SP={%spMads}";
                    A += "&POS={%posMads}";
                }
                this.options.flashVars.adCallTemplate = escape(A);
            },
            processPlayerData: function () {
                if (this.options.useCurrentPageUrl) {
                    this.options.useCurrentPageUrl = document.URL;
                }
                if (Cookie.get("userVolume") != null) {
                    this.options.startVolume = Cookie.get("userVolume");
                }
            },
            validateFlashVars: function () {
                var A = this.options.flashVars;
                if (A.controlsDisplay == "over" && A.bbuttonDisplay == "auto") {
                    A.controlsDisplay = "below";
                }
                if (A.playerWidth != A.vidWidth && A.playlistDisplay != "right") {
                    A.vidWidth = A.playerWidth;
                }
            },
            setUvpcPath: function () {
                var A = new String();
                switch (this.options.flashVars.si) {
                case "1":
                    A = "uvp_cnetredball";
                    break;
                case "3":
                    A = "uvp_news";
                    break;
                case "4":
                    A = "uvp_download";
                    break;
                case "7":
                    A = "uvp_reviews";
                    break;
                case "9":
                    A = "uvp_shopper";
                    break;
                case "53":
                    A = "uvp_cnettv";
                    break;
                case "162":
                    A = "uvp_cbsnews";
                    break;
                default:
                    A = "uvp_cnet";
                }
                this.options.flashVars.uvpc = "http://i.d.com.com/av/video/cnettv/config/" + A + ".xml";
                dbug.log("GeckoVideoPlayer: selected " + A + ".xml for site " + this.options.flashVars.si);
            },
            createPlayer: function () {
                var E = this.makeDiv();
                if (this.checkFlashVersion().isOk) {
                    var A = this.options.flashVars.playerWidth;
                    var C = this.options.flashVars.playerHeight;
                    var D = this.options.initAction;
                    dbug.log("createPlayer: init: " + D);
                    if (D) {
                        this.makeSwf(E, A, C);
                    } else {
                        var B = $(this.options.initObject) || $$(this.options.initObject);
                        B.addEvent(this.options.initAction, function () {
                            this.makeSwf(E, A, C);
                        });
                    }
                } else {
                    E.set("html", '<div id="noFlashMsg">We&rsquo;ve detected that you need to upgrade or install Flash to view our library of thousands of tech videos. Installing Flash is fast, free, and easy! Simply follow the instructions from your browser, or <a href="http://www.adobe.com/go/getflashplayer" id="flashVidErrorLink">click here to install/upgrade the free Flash player</a>.<br />&nbsp;<br />Thanks,<br />The CNET TV Team</div>');
                }
            },
            makeDiv: function () {
                var A = new Element("div", {
                    id: "universalVideoWrapper" + GeckoVideoPlayer.manager.players.length,
                    "class": "universalVideoWrapper"
                });
                A.setStyles({
                    background: this.options.params.bgcolor,
                    width: this.options.flashVars.playerWidth,
                    height: this.options.flashVars.playerHeight
                });
                return wrapper = A.inject(this.options.parentElement);
            },
            checkFlashVersion: function () {
                var C = 8;
                var B;
                if (navigator.plugins && navigator.mimeTypes.length) {
                    B = navigator.plugins["Shockwave Flash"];
                    if (B && B.description) {
                        B = B.description;
                    }
                } else {
                    if (Browser.Engine.trident) {
                        B = $try(function () {
                            return new ActiveXObject("ShockwaveFlash.ShockwaveFlash").GetVariable("$version");
                        });
                    }
                }
                pluginVersion = (typeof B == "string") ? parseInt(B.match(/\d+/)[0]) : 0;
                var A = pluginVersion >= C;
                return {
                    isOk: A,
                    version: pluginVersion
                };
            },
            makeSwf: function (E, A, H) {
                var B = document.URL;
                var D = "universal";
                if (this.options.localTest == true) {
                    var C = "http://publish.cnet.com:8100/av/video/flv/GeckoVideoPlayer/tests/" + D + ".swf";
                }
                if (window.location.href.indexOf("playerVersion") > 0) {
                    var J = Browser.getQueryStringValues().playerVersion;
                    var C = "/av/video/flv/GeckoVideoPlayer/" + J + "/" + D + ".swf";
                }
                var F = E.getProperty("id").split("universalVideoWrapper")[1];
                var I = this.options.parentElement;
                var G = new Swiff(this.options.swfPath, {
                    id: "GeckoVideoPlayer" + F,
                    width: A,
                    height: H,
                    container: E,
                    params: this.options.params,
                    vars: this.options.flashVars
                });
            }
        });
        var Swiff = new Class({
            Implements: [Options],
            options: {
                id: null,
                height: 1,
                width: 1,
                container: null,
                properties: {},
                params: {
                    quality: "high",
                    allowScriptAccess: "always",
                    wMode: "transparent",
                    swLiveConnect: true
                },
                callBacks: {},
                vars: {}
            },
            toElement: function () {
                return this.object;
            },
            initialize: function (L, M) {
                this.instance = "Swiff_" + $time();
                this.setOptions(M);
                M = this.options;
                var B = this.id = M.id || this.instance;
                var A = $(M.container);
                Swiff.CallBacks[this.instance] = {};
                var E = M.params,
                    G = M.vars,
                    F = M.callBacks;
                var H = $extend({
                    height: M.height,
                    width: M.width
                }, M.properties);
                var K = this;
                for (var D in F) {
                    Swiff.CallBacks[this.instance][D] = (function (N) {
                        return function () {
                            return N.apply(K.object, arguments);
                        };
                    })(F[D]);
                    G[D] = "Swiff.CallBacks." + this.instance + "." + D;
                }
                E.flashVars = Hash.toQueryString(G);
                if (Browser.Engine.trident) {
                    H.classid = "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000";
                    E.movie = L;
                } else {
                    H.type = "application/x-shockwave-flash";
                    H.data = L;
                }
                var J = '<object id="' + B + '"';
                for (var I in H) {
                    J += " " + I + '="' + H[I] + '"';
                }
                J += ">";
                for (var C in E) {
                    if (E[C]) {
                        J += '<param name="' + C + '" value="' + E[C] + '" />';
                    }
                }
                J += "</object>";
                this.object = ((A) ? A.empty() : new Element("div")).set("html", J).firstChild;
            },
            replaces: function (A) {
                A = $(A, true);
                A.parentNode.replaceChild(this.toElement(), A);
                return this;
            },
            inject: function (A) {
                $(A, true).appendChild(this.toElement());
                return this;
            },
            remote: function () {
                return Swiff.remote.apply(Swiff, [this.toElement()].extend(arguments));
            }
        });
        Swiff.CallBacks = {};
        Swiff.remote = function (obj, fn) {
            var rs = obj.CallFunction('<invoke name="' + fn + '" returntype="javascript">' + __flash__argumentsToXML(arguments, 2) + "</invoke>");
            return eval(rs);
        };
    }
    var PageTools = new Hash({
        get: function (C, A) {
            A = A || {};
            var B = false;
            switch (C) {
            case "title":
                B = PageVars.get("title") || $(document.head).getElement("title").get("text");
                break;
            case "description":
                B = PageVars.get("description") || $(document.head).getElement("meta[name=description]").get("content");
                break;
            case "siteName":
                B = PageVars.get("siteName") || PageTools.getSiteName();
                break;
            case "href":
                B = PageVars.get("href") || new Link(location.href).mergeQueryString({
                    jsdebug: false,
                    refresh: false,
                    tag: false
                }).set("hash", false).get("href");
                B = (B.contains("http://") || B.contains(escape("http://"))) ? B : "http://" + window.location.host + B;
                break;
            case "path":
                B = PageVars.get("href") || new Link(location.href).mergeQueryString({
                    jsdebug: false,
                    refresh: false,
                    tag: false
                }).set("hash", false).get("href");
                B = (B.contains("http://") || B.contains(escape("http://"))) ? B : "http://" + window.location.host + B;
                break;
            case "SendTo":
                B = PageVars.get("SendTo") || "";
                break;
            case "Sender":
                B = PageVars.get("Sender") || "";
                break;
            case "message":
                B = PageVars.get("message") || "";
                break;
            }
            if (A.encode) {
                B = encodeURIComponent(B);
            }
            return B;
        },
        getSiteName: function () {
            switch (PageVars.get("siteId", "number")) {
            case 3:
            case 105:
            case 109:
                return "CNET News.com";
            case 4:
            case 5:
                return "CNET Download.com";
            case 7:
                return "CNET Reviews";
            case 9:
                return "Shopper.com";
            case 162:
                return "CBSNews.com";
            default:
                return "CNET.com";
            }
        },
        email: function () {
            new Request({
                url: "/" + PageVars.getOid({
                    pageType: 8790,
                    nodeId: 4
                }) + ".html?nomesh",
                data: new Hash({
                    sourceUrl: decodeURIComponent(PageTools.get("href")),
                    ProductName: decodeURIComponent(PageTools.get("title")),
                    ProductInfo: decodeURIComponent(PageTools.get("description")),
                    SiteName: PageTools.get("siteName"),
                    SendTo: PageTools.get("SendTo"),
                    Sender: PageTools.get("Sender"),
                    message: PageTools.get("message")
                }).toQueryString(),
                onComplete: function (A) {
                    var B = $("emailShell") || new Element("div", {
                        id: "emailShell"
                    }).inject(document.body).empty();
                    B.set("html", A);
                    new GlobalModal({
                        content: B.getElement(".globalModal"),
                        userIframeShim: !! Browser.Engine.trident4,
                        onInit: function () {
                            var C = this.win.getElement("form");
                            this.win.getElements("input[name=Sender], input[name=SendTo]").addClass("validate-email");
                            this.win.getElements("input[name=CAPTCHA_RESPONSE]").addClass("required");
                            this.win.getElements("input[type=hidden]").inject(C);
                            PageTools.emailValidator = new FormValidator(this.win.getElement("form"), {
                                evaluateFieldsOnBlur: true,
                                evaluateFieldsOnChange: false,
                                evaluateOnSubmit: false
                            });
                            C.addEvent("submit", function (E) {
                                if (E) {
                                    E.stop();
                                }
                                if (!PageTools.emailValidator.validate()) {
                                    return;
                                }
                                var D = this.win.getElement("form");
                                new Request({
                                    url: D.get("action"),
                                    data: D.toQueryString(),
                                    method: "post",
                                    onRequest: function () {
                                        PageVars.set("SendTo", D.getElement("input[name=SendTo]").get("value"));
                                        PageVars.set("Sender", D.getElement("input[name=Sender]").get("value"));
                                        PageVars.set("message", D.getElement("textarea[name=message]").get("value"));
                                        this.win.getElements("p.error").dispose();
                                    }.bind(this),
                                    onComplete: function (F) {
                                        if (!F || !F.contains("<title>Thank You</title>")) {
                                            PageTools.email();
                                            return;
                                        }
                                        PageVars.set("SendTo", "");
                                        PageVars.set("Sender", "");
                                        PageVars.set("message", "");
                                        new Element("div", {
                                            "class": "thanks",
                                            html: "Your message has been sent."
                                        }).replaces(D);
                                        new Jlogger({
                                            tag: "submitEmail"
                                        }).ping();
                                        this.win.setPosition({});
                                    }.bind(this)
                                }).send();
                            }.bind(this));
                        },
                        showNow: true
                    });
                }
            }).send();
        },
        print: function () {
            window.print();
            new Jlogger({
                tag: "shareDropDownPrint"
            }).ping();
        },
        initShare: function () {
            this.overShare = {
                tab: false,
                content: false
            };
            this.checkForPageVars();
        },
        checkForPageVars: function () {
            if (PageVars.get("href") == null) {
                PageVars.set("href", document.location.toString());
            }
            if (PageVars.get("title") == null) {
                PageVars.set("title", document.getElement("title").get("text"));
            }
            if (PageVars.get("description") == null) {
                PageVars.set("description", document.getElement("meta[name=description]").get("content"));
            }
        },
        openShare: function (A) {
            A.stop();
            if (this.shareShell) {
                this.positionShareShell(A.target);
                this.shareShell.setStyle("display", "block");
            } else {
                this.shareNode = (PageVars.get("siteId") == 4) ? 20 : (PageVars.get("siteId") == 162) ? 100 : 1;
                new Request({
                    url: "/8791-" + this.shareNode + "_" + PageVars.get("siteId") + "-0.html?nomesh",
                    data: {
                        shareURL: PageTools.get("href"),
                        shareTitle: PageTools.get("title"),
                        shareDescription: PageTools.get("description")
                    },
                    onSuccess: function (B) {
                        this.createShareShell(A.target, B);
                    }.bind(this)
                }).send();
            }
        },
        createShareShell: function (C, A) {
            C.getParent().setStyles("width", C.getComputedSize().totalWidth);
            this.shareShell = new Element("div", {
                id: "shareDropDown"
            }).inject(document.body);
            this.shareShell.set("html", A);
            try {
                $$(".contentTools .shareYbuzz")[0].inject(this.shareShell.getElement(".shareLinks.right"));
                $$(".contentTools .shareYbuzz").dispose();
            } catch (B) {
                dbug.log("Ybuzz is not on the page");
            }
            $("shareDropDown").getElements("li").each(function (D) {
                new Jlogger({
                    tag: D.getElement("a").get("class").toLowerCase().replace("linkicon ", ""),
                    ctype: PageVars.get("pageType"),
                    cval: "social_share",
                    element: D,
                    event: "click"
                });
            });
            this.positionShareShell(C);
            this.setShowHideActions();
        },
        positionShareShell: function (A) {
            this.shareShell.setPosition({
                relativeTo: A,
                position: (A.hasClass("anchorLeft")) ? "upperLeft" : "upperRight",
                edge: (A.hasClass("anchorLeft")) ? "upperLeft" : "upperRight",
                offset: {
                    x: (A.hasClass("anchorLeft")) ? (Browser.Engine.trident4) ? -6 : -11 : (Browser.Engine.trident4) ? 8 : 12,
                    y: (Browser.Engine.trident4) ? -5 : -6
                }
            });
            if (A.hasClass("anchorLeft")) {
                this.shareShell.addClass("anchorLeft");
            }
            if (this.initialFontSize) {
                this.shareShell.getElement(".shareHead").setStyle("font-size", this.initialFontSize + "%");
            }
        },
        setShowHideActions: function () {
            this.shareShell.getElement(".shareHead").addEvents({
                mouseenter: function () {
                    this.overShare.tab = true;
                }.bind(this),
                mouseleave: function () {
                    this.overShare.tab = false;
                    this.hideShareShell.delay(20, this);
                }.bind(this)
            });
            this.shareShell.getElement(".shareContent").addEvents({
                mouseenter: function () {
                    this.overShare.content = true;
                }.bind(this),
                mouseleave: function () {
                    this.overShare.content = false;
                    this.hideShareShell.delay(20, this);
                }.bind(this)
            });
        },
        hideShareShell: function () {
            if (this.overShare.tab == false && this.overShare.content == false) {
                this.shareShell.setStyle("display", "none");
            }
        },
        fontSizeSmaller: function () {
            if (this.initialFontSize > 75.2) {
                var A = this.initialFontSize - 8.3;
                $("contentBody").set("styles", {
                    "font-size": A + "%"
                });
                this.initialFontSize = A;
                if (this.initialFontSize < 133.2) {
                    $$(".pageType2100 #overviewHead.withTools").setStyle("padding-bottom", 5);
                }
                this.setFontCookie();
            }
        },
        fontSizeLarger: function () {
            if (this.initialFontSize < 149) {
                var A = this.initialFontSize + 8.3;
                $("contentBody").set("styles", {
                    "font-size": A + "%"
                });
                this.initialFontSize = A;
                if (this.initialFontSize >= 133.2) {
                    $$(".pageType2100 #overviewHead.withTools").setStyle("padding-bottom", 25);
                }
                this.setFontCookie();
            }
        },
        setFontCookie: function () {
            Cookie.write("cnetFontSize", this.initialFontSize, {
                domain: ".cnet.com",
                duration: 365,
                path: "/"
            });
        },
        setFontStyles: function () {
            if (Cookie.read("cnetFontSize") && (PageVars.get("pageType") == 8301 || PageVars.get("pageType") == 2100)) {
                this.initialFontSize = Cookie.read("cnetFontSize").toFloat();
                var A = (this.initialFontSize >= 133.2) ? ".pageType2100 #overviewHead.withTools{padding-bottom: 25px;}" : "";
                if (Browser.Engine.trident) {
                    $("fontSizeStyles").styleSheet.cssText = "#contentBody{font-size:" + this.initialFontSize + "%;}" + A;
                } else {
                    $("fontSizeStyles").set("text", "#contentBody{font-size:" + this.initialFontSize + "%;}" + A);
                }
            } else {
                this.initialFontSize = 100;
            }
        }
    });
    window.addEvent("domready", function () {
        if ($$(".contentTools").length) {
            PageTools.initShare();
        }
    });
    var AboutBlog = new Class({
        Implements: [Options],
        options: {
            containerElement: $("aboutBlog"),
            linkElement: $("stayConnected"),
            blogHasNewsletter: true,
            contactXpos: "42px",
            rssXpos: "80px",
            twitterXpos: "120px",
            facebookXpos: "159px",
            emailXpos: "2px",
            emailsubscribedXpos: "2px",
            yPos: "31px"
        },
        initialize: function (C) {
            var B = this;
            this.setOptions(C);
            if (this.options.linkElement == "") {
                this.options.linkElement = this.options.containerElement.getNext();
            }
            var A = this.options.containerElement.getChildren();
            A.each(function (F) {
                F.addEvent("mouseenter", function () {
                    B.swapTxt(F);
                });
            });
            this.options.containerElement.setStyle("background-position", this.options.emailXpos + " " + this.options.yPos);
            var E = new fbEmailPerms();
            NewNewsletter.updateOnRefresh();
            if (!UserVars.isLoggedIn()) {
                CURS.Manager.addEvent("onLogin", function () {
                    (function () {
                        dbug.log("firing delay func");
                        try {
                            if (!NewNewsletter.reloc) {
                                window.location = PageVars.getRefreshPath({
                                    subscribe: true,
                                    unsubscribe: false
                                });
                            }
                        } catch (F) {
                            dbug.log("Newsletter onlogin event failure: %o", F);
                        }
                    }).delay(20);
                });
                try {
                    $E(".subscribe").addEvent("click", function (F) {
                        if (F.stop) {
                            F.stop();
                        }
                        var G = $(F.target).getParent("[newsletter]");
                        if (G) {
                            Cookie.write("addNL", G.getProperty("newsletter"));
                        }
                        CURS.Manager.checkLogin({
                            loginHed: "Log in to CNET to subscribe",
                            registerHed: "Join CNET to subscribe",
                            appId: (PageVars.get("siteId", "number") == 4) ? 47 : 16
                        });
                    });
                    $("stayConnected").getElement("a").cloneEvents($("email"), "click");
                } catch (D) {
                    dbug.log("No subscribe element on page!");
                }
            } else {
                try {
                    $E(".subscribe").addEvent("click", function (F) {
                        if (F.stop) {
                            F.stop();
                        }
                        if (CURS.Social && CURS.Social.fb.isUser()) {
                            E.checkForFbLink(F);
                        } else {
                            new NewNewsletter.Manage(F.target);
                        }
                    });
                    $("stayConnected").getElement("a").cloneEvents($("email"), "click");
                } catch (D) {
                    dbug.log("No subscribe element on page!");
                }
            }
            try {
                new NewNewsletter.Prefs("newsletterPrefsModal", {
                    triggerSel: ".updatePrefs"
                });
            } catch (D) {}
        },
        swapTxt: function (E) {
            var D = E.get("id");
            this.options.linkElement.fade("hide");
            $("stayConnected").getElement("a").removeEvents("click");
            var C = this.options.yPos;
            var A = this.options.emailXpos + " " + C;
            var B = "Subscribe to e-mail updates";
            switch (D) {
            case "contact":
                A = this.options.contactXpos + " " + C;
                B = "Contact Editors";
                break;
            case "rss":
                A = this.options.rssXpos + " " + C;
                B = "Add RSS Feed";
                break;
            case "twitter":
                A = this.options.twitterXpos + " " + C;
                B = "Follow us on Twitter";
                break;
            case "facebook":
                A = this.options.facebookXpos + " " + C;
                B = "Friend us on Facebook";
                break;
            case "email":
                A = this.options.emailXpos + " " + C;
                B = "Subscribe to e-mail updates";
                break;
            case "emailsubscribed":
                A = this.options.emailsubscribedXpos + " " + C;
                B = "You are subscribed to e-mail updates";
                break;
            default:
            }
            this.options.containerElement.tween("background-position", A);
            this.options.linkElement.getElement("a").removeEvents("click");
            this.options.linkElement.getElement("a").set("href", $(D).getElement("a").getProperty("href"));
            this.options.linkElement.getElement("a").set("text", B);
            if (D == "email") {
                this.options.linkElement.getElement("a").cloneEvents($("email"), "click");
            }
            this.options.linkElement.fade(1);
        }
    });
    var fbEmailPerms = new Class({
        Implements: Options,
        initialize: function (A) {
            this.setOptions(A);
            this.setPermsPrompt();
        },
        setPermsPrompt: function () {
            var B = new Element("div", {
                "class": "globalModal"
            }).set("html", '<h2>E-mail permissions have not been granted<a class="closeModal"></a></h2>You have not set permissions for CNET to send email through your Facebook account. You will need to do so before you can subscribe to a newsletter. To set permissions:<ol><li>Click the button below to open a permissions prompt from Facebook.</li><li>On the Facebook prompt, click Receive Emails.</li></ol>');
            var A = new Element("a", {
                id: "launchFbPerms",
                "class": "flexButton"
            }).set("html", "<b>Continue</b>");
            B.adopt(A);
            this.permsPrompt = new GlobalModal({
                id: "permsPrompt",
                content: B
            });
            A.addEvent("click", function () {
                this.getFBpermsPopup();
            }.bind(this));
        },
        getFBpermsPopup: function () {
            this.permsPrompt.hide();
            try {
                FB.Connect.showPermissionDialog("email", function () {
                    fbSession = FB.Facebook.apiClient.get_session();
                    var C = new CURS.RPS.Request({
                        resource: "social-hasAppPermission",
                        data: {
                            socialId: fbSession.uid,
                            socialSite: "fb",
                            appId: 186,
                            permission: "email",
                            socialSessionKey: fbSession.session_key
                        },
                        async: false
                    }).send().response;
                    if (C.json && C.json.HasPermission) {
                        if (C.json.HasPermission["$"] == "true") {
                            new NewNewsletter.Manage(this.event.target);
                        }
                    }
                }.bind(this));
            } catch (B) {
                var A = this.event;
                FB.login(function (C) {
                    if (C.session) {
                        var D = new CURS.RPS.Request({
                            resource: "social-hasAppPermission",
                            data: {
                                socialId: fbSession.uid,
                                socialSite: "fb",
                                appId: CURS.Social.fb.getRegAppId(),
                                permission: "email",
                                socialSessionKey: fbSession.session_key
                            },
                            async: false
                        }).send().response;
                        if (D.json.HasPermission["$"] == "true") {
                            new NewNewsletter.Manage(A.target);
                        } else {
                            dbug.log("no email perms");
                        }
                    } else {
                        dbug.log("not logged in");
                    }
                }, {
                    perms: "email"
                });
            }
        },
        checkPerms: function () {
            fbSession = (FB.Facebook) ? FB.Facebook.apiClient.get_session() : FB.getSession();
            var A = new CURS.RPS.Request({
                resource: "social-hasAppPermission",
                data: {
                    socialId: fbSession.uid,
                    socialSite: "fb",
                    appId: 186,
                    permission: "email",
                    socialSessionKey: fbSession.session_key
                },
                async: false
            }).send().response;
            if (A.json && A.json.HasPermission) {
                if (A.json.HasPermission["$"] == "true") {
                    new NewNewsletter.Manage(this.event.target);
                } else {
                    this.permsPrompt.show();
                }
            }
        },
        checkForFbLink: function (A) {
            this.event = A;
            new CURS.RPS.Request({
                resource: "rps-regIdToEmail",
                data: {
                    regId: UserVars.get("ursRegId"),
                    appId: "103"
                },
                onSuccess: function (C) {
                    var B = C.User.Email["$"];
                    if (B.match("@proxymail.facebook.com")) {
                        this.checkPerms(A);
                    } else {
                        if (PageVars.get("assetId") == 58 || (PageVars.get("pageNumber") == 58)) {
                            new NewNewsletter.Manage(this.event.target);
                        } else {
                            new NewNewsletter.Manage(this.event.target);
                        }
                    }
                }.bind(this),
                onFailStatus: function (B) {
                    B = B.Status.Error;
                    if (B.ErrorMessage["$"] == "Unauthorized. Only authenticated or internal users may make this request.") {
                        CURS.Manager.nextAction = function () {
                            this.checkForFbLink(this.event);
                        }.bind(this);
                        CURS.Manager.getLogin({
                            ursForm: "reauthenticate"
                        });
                    }
                }.bind(this)
            }).send();
        }
    });
    var NewNewsletter = new Hash({
        Manage: new Class({
            options: {
                submitUrl: "/8674-4_" + PageVars.get("siteId") + "-0.html",
                nlIdKey: "newsletter",
                unsubscribeHTML: '<a href="http://www.cnet.com/newsletters" target="new">You are subscribed to e-mail updates</a>'
            },
            initialize: function (B, A) {
                B = $(B);
                if (B.get("tag") != "li") {
                    B = B.getParent("[newsletter]");
                }
                this.shell = (B.getProperty(this.options.nlIdKey)) ? B : B.getParent("[" + this.options.nlIdKey + "]");
                this.id = this.shell.getProperty(this.options.nlIdKey);
                if (B.hasClass("subscribe")) {
                    this.action = "subscribe";
                } else {
                    this.action = null;
                }
                this.waiter = new Waiter(this.shell);
                this.pingServer();
            },
            updateState: function () {
                $("email").set("id", "emailsubscribed");
                $("stayConnected").set("html", this.options.unsubscribeHTML);
                $("stayConnected").set("style", "background-position: 249px -469px;");
                $("emailsubscribed").removeEvents("click");
                $("emailsubscribed").removeClass("subscribe");
                $("emailsubscribed").set("href", "http://www.cnet.com/newsletters");
                $("emailsubscribed").set("target", "new");
            },
            pingServer: function () {
                var A = "";
                A += "action=" + (this.action);
                A += "&" + (this.action) + "Ids=" + this.shell.getProperty("newsletter");
                new Request({
                    url: this.options.submitUrl,
                    method: "get",
                    data: A,
                    onRequest: function () {
                        this.waiter.start();
                    }.bind(this),
                    onComplete: function (B) {
                        this.waiter.stop();
                        B = JSON.decode(B);
                        if (B && B.status && B.status == "success") {
                            this.updateState();
                        }
                    }.bind(this)
                }).send();
            }
        }),
        updateOnRefresh: function () {
            var B = new Cookie("addNL");
            if (B.read()) {
                var C = $E("li[newsletter=" + B.read() + "]");
                if (C) {
                    new Fx.Scroll(window).toElement(C);
                    var A = C.getElement(".subscribe");
                    if (A) {
                        new NewNewsletter.Manage(A);
                    }
                }
                B.dispose();
            }
        },
        Prefs: new Class({
            Implements: Options,
            options: {
                triggerSel: ".nlPrefsLink"
            },
            initialize: function (B, A) {
                this.setOptions(A);
                this.shell = $(B).inject(document.body);
                this.triggers = $$(this.options.triggerSel);
                this.triggers.addEvent("click", this.toggle.bind(this));
                this.shell.getElements(".closeModal").addEvent("click", this.hide.bind(this));
                this.initPrefs();
                this.ping = new Request({
                    url: "/8674-4-0.html",
                    method: "get"
                });
            },
            initPrefs: function () {
                this.shell.getElements("input[type=radio]").each(function (A) {
                    A.addEvent("click", this.updateRadio.pass(A, this));
                }.bind(this));
            },
            updateRadio: function (A) {
                if (A.hasClass("ping")) {
                    this.pingPref({
                        action: "updateMailPref",
                        mailPref: A.get("value")
                    });
                }
                this.notifyUpdate(A);
            },
            notifyUpdate: function (C) {
                var B = new Element("span", {
                    text: "preference saved",
                    styles: {
                        opacity: 0,
                        color: "#C00",
                        "font-weight": "bold"
                    }
                }).inject(C.getParent("label"));
                var A = function () {
                    if (B.getStyle("opacity") > 0.1) {
                        (function () {
                            B.morph({
                                opacity: 0
                            });
                        }).delay(1500);
                    } else {
                        B.dispose();
                    }
                };
                B.set("morph", {
                    duration: 250,
                    onComplete: A
                }).morph({
                    opacity: 1
                });
            },
            pingPref: function (A) {
                A = A || {};
                this.ping.send(new Hash(A).toQueryString());
            },
            show: function () {
                this.shell.setPosition({});
                this.shell.setStyle("top", window.getScrollTop() + 50);
                this.shell.setStyle("display", "block");
            },
            hide: function () {
                this.shell.setStyle("display", "none");
            },
            toggle: function () {
                if (this.shell.getStyle("display") == "none") {
                    this.show();
                } else {
                    this.hide();
                }
            }
        }),
        resetReloc: function () {
            NewNewsletter.reloc = false;
            CURS.Manager.removeEvent("onClose", NewNewsletter.resetReloc);
        }
    });
    var getElementCoordinates = function (A) {
        var C = A = $(A),
            B = A.getCoordinates();
        if (Browser.Engine.trident) {
            B.top = 0;
            B.left = 0;
            do {
                B.top += C.offsetTop;
                B.left += C.offsetLeft;
            } while (C = C.offsetParent);
            B.bottom = B.top + B.height;
            B.right = B.left + B.width;
        }
        return B;
    };
    PageTools.ShareShell = new Class({
        Implements: Options,
        options: {
            nestedElem$$: ".shareHead, .shareContent"
        },
        initialize: function (B, C, A) {
            B = $(B);
            if (B.retrieve("shareShell")) {
                return false;
            }
            this.setOptions(A);
            this.trigger = B;
            this.trigger.store("shareShell", this);
            this.data = (C) ? new Hash(C) : PageVars.data;
            this.setEvents(this.trigger);
            return this;
        },
        open: function () {
            var B, A;
            if (this.showing && !this.shareShell) {
                return;
            }
            if (this.shareShell && this.showing) {
                this.show();
            } else {
                if (this.shareShell) {
                    this.showing = this.show.delay(100, this);
                } else {
                    this.showing = true;
                    B = this.data;
                    A = (B.get("siteId") == 4) ? 20 : (B.get("siteId") == 162) ? 100 : 1;
                    new Request({
                        url: "/8791-" + A + "_" + B.get("siteId") + "-0.html?nomesh",
                        data: {
                            shareURL: B.get("shareURL"),
                            shareTitle: B.get("shareTitle"),
                            shareDescription: B.get("shareDescription").replace(/ More$/, "")
                        },
                        onSuccess: this.createShareShell.bind(this)
                    }).send();
                }
            }
        },
        setEvents: function (A) {
            if (!this.bound) {
                this.bound = {
                    show: this.open.bind(this),
                    hide: function () {
                        this.hiding = (function () {
                            this.showing = $clear(this.showing);
                            this.hide();
                        }).delay(50, this);
                    }.bind(this),
                    mousemove: this.checkMousePosition.bind(this)
                };
            }
            $$(A).addEvent("mouseenter", this.bound.show);
            if (A == this.trigger) {
                this.trigger.addEvent("mouseleave", function () {
                    if (this.showing) {
                        this.showing = $clear(this.showing);
                    }
                });
            } else {
                $$(A).addEvent("mouseleave", this.bound.hide);
            }
        },
        checkMousePosition: function (A) {
            if (this.checkPos) {
                this.checkPos = $clear(this.checkPos);
            }
            this.checkPos = this.checkPosition.delay(20, this, A);
        },
        checkPosition: function (D) {
            var E = false,
                C = D.page,
                A;
            for (A = 0; A < this.areas.length; A++) {
                var B = this.areas[A];
                if (B.left <= C.x && B.right >= C.x) {
                    if (B.top <= C.y && B.bottom >= C.y) {
                        E = true;
                        break;
                    }
                }
            }
            if (!E) {
                this.hide();
            }
        },
        createShareShell: function (A) {
            var B = this.trigger;
            B.getParent().setStyles("width", B.getComputedSize().totalWidth);
            this.shareShell = new Element("div", {
                id: "shareDropDown"
            }).inject(document.body);
            this.shareShell.set("html", A);
            this.trigger.removeEvent("mouseleave", this.bound.hide);
            this.nestedElements = this.shareShell.getElements(this.options.nestedElem$$);
            this.setEvents(this.shareShell);
            this.open();
        },
        positionShareShell: function () {
            var A;
            this.shareShell.setPosition({
                relativeTo: this.trigger,
                position: (this.trigger.hasClass("anchorLeft")) ? "upperLeft" : "upperRight",
                edge: (this.trigger.hasClass("anchorLeft")) ? "upperLeft" : "upperRight",
                offset: {
                    x: (this.trigger.hasClass("anchorLeft")) ? (Browser.Engine.trident4) ? -6 : -11 : (Browser.Engine.trident4) ? 8 : 12,
                    y: (Browser.Engine.trident4) ? -5 : -6
                }
            });
            if (Browser.Engine.trident) {
                A = getElementCoordinates(this.trigger);
                this.shareShell.setStyles({
                    top: A.top - 6,
                    left: A.left - 6
                });
            }
            this.areas = [];
            this.nestedElements.each(function (B) {
                this.areas.push(getElementCoordinates(B));
            }, this);
            if (PageTools.initialFontSize) {
                this.shareShell.getElement(".shareHead").setStyle("font-size", PageTools.initialFontSize + "%");
            }
        },
        show: function () {
            if (this.hiding) {
                this.hiding = $clear(this.hiding);
            }
            this.positionShareShell();
            this.shareShell.setStyle("display", "block");
            window.addEvent("mousemove", this.bound.mousemove);
        },
        hide: function () {
            if (this.shareShell) {
                this.shareShell.setStyle("display", "none");
            }
            window.removeEvent("mousemove", this.bound.mousemove);
        }
    });
    var CnetDoorCarousel = new Class({
        Implements: StyleWriter,
        initialize: function () {
            if ($$(".macInteraction").length) {
                this.createStyle("#rubicsTextAd {display:none !important;}", "hideRubics");
            }
            this.carousel = new CBSCarousel("carouselMain", {
                slide$$: ".slide",
                slideInterval: 7000,
                autoplay: false,
                transitionDuration: 700,
                indicatorContainerClass: "#carouselMain .thumbContainer",
                rotateAction: "click",
                indicator$$: ".featureButton"
            });
            window.addEvent("domready", this.startCarousel.bind(this));
        },
        startCarousel: function () {
            var A = $$(".macInteraction"),
                C, B;
            A.each(function (D) {
                var E;
                if (!C && !B) {
                    if (E = D.getProperty("mac-interaction-stop")) {
                        B = true;
                    }
                    if (E = D.getProperty("mac-interaction-carousel")) {
                        C = E;
                    }
                }
            });
            if (C) {
                this.carousel.options.slideInterval = C.toInt();
            }
            if (!B) {
                this.carousel.setHoverPausing();
                this.carousel.setWindowPausing();
                this.carousel.autoplay();
            }
        }
    });
    if (!CBSi.monitor) {
        CBSi.monitor = (window.ActivityMonitor && ActivityMonitor.monitor) ? ActivityMonitor.monitor : new ActivityMonitor();
    }
    var listings;
    window.addEvent("domready", function () {
        if (!$$(".topHeadlinesPromo.noOverride, .topHeadlinesPromo .liveNow").length) {
            try {
                new LiveStreamStatusCheckR2D2({
                    promo$: $E(".topHeadlines .topHeadlinesPromo"),
                    altPromo$: $E(".topHeadlines .comingUp")
                });
            } catch (C) {
                dbug.log("LiveStreamStatusCheck init fail: %o", C);
            }
        }
        var A = new AboutBlog({
            containerElement: $("aboutCNET"),
            linkElement: $("stayConnected"),
            contactXpos: "-1px",
            rssXpos: "31px",
            twitterXpos: "63px",
            facebookXpos: "95px",
            emailXpos: "-33px",
            emailsubscribedXpos: "-33px",
            yPos: "-508px"
        });
        listings = new FrontDoorRiver("cnetRiver", {
            recentTab$: $("cnetRiver").getElement(".riverNavs li.recent"),
            popularTab$: $("cnetRiver").getElement(".riverNavs li.popular")
        });
        if ($(listings.options.list$).getElement("li.riverSponsor")) {
            var B = new Element("ul").adopt($(listings.options.list$).getElement("li.riverSponsor").clone());
        } else {
            var B = null;
        }
        $("tweetsOn").addEvent("click", function () {
            Cookie.write("tweetCookie", "on", {
                duration: 30
            });
            $("tweetsOff").getParent().removeClass("active");
            $("tweetsOn").getParent().addClass("active");
            listings.options.params.assets = "2,6,9,14,97";
            new ContentUpdater("cnetRiverUpdater", {
                ".socialMediaMain": {
                    element: $("pe-socialMediaMain"),
                    onRequest: function () {
                        if (!this.waiter) {
                            this.waiter = new Waiter($("pe-socialMediaMain"));
                        }
                        this.waiter.start();
                    },
                    onComplete: function () {
                        if (this.waiter) {
                            this.waiter.stop();
                        }
                        $("ajaxMorePostings").getParent().set("class", $("ajaxMorePostings").getParent().get("class"));
                    },
                    onSuccess: function () {
                        listings.options.params.start = 0;
                        listings.tempStart = 0;
                        listings.initEntries();
                        if (B != null && !this.element.getElement("li.riverSponsor")) {
                            B.getElement("li.riverSponsor").clone().inject(this.element.getElements("li.riverPost")[3], "after");
                        }
                    }
                }
            }, {
                url: PageVars.getPath({
                    pageType: 8330
                }),
                data: {
                    limit: 15,
                    assets: "2,6,9,14,97",
                    nomesh: true,
                    refresher: new Date().getSeconds().toString() + new Date().getMilliseconds().toString(),
                    start: 0
                },
                evalScripts: (Browser.Engine.trident)
            }).send();
        });
        $("tweetsOff").addEvent("click", function () {
            Cookie.write("tweetCookie", "off", {
                duration: 30
            });
            $("tweetsOn").getParent().removeClass("active");
            $("tweetsOff").getParent().addClass("active");
            listings.options.params.assets = "2,6,9,14";
            new ContentUpdater("cnetRiverUpdater", {
                ".socialMediaMain": {
                    element: $("pe-socialMediaMain"),
                    onRequest: function () {
                        if (!this.waiter) {
                            this.waiter = new Waiter($("pe-socialMediaMain"));
                        }
                        this.waiter.start();
                    },
                    onComplete: function () {
                        if (this.waiter) {
                            this.waiter.stop();
                        }
                        $("ajaxMorePostings").getParent().set("class", $("ajaxMorePostings").getParent().get("class"));
                    },
                    onSuccess: function () {
                        listings.options.params.start = 0;
                        listings.tempStart = 0;
                        listings.initEntries();
                        if (B != null && !this.element.getElement("li.riverSponsor")) {
                            B.getElement("li.riverSponsor").clone().inject(this.element.getElements("li.riverPost")[3], "after");
                        }
                    }
                }
            }, {
                url: PageVars.getPath({
                    pageType: 8330
                }),
                data: {
                    limit: 15,
                    assets: "2,6,9,14",
                    nomesh: true,
                    refresher: new Date().getMilliseconds(),
                    start: 0
                },
                evalScripts: (Browser.Engine.trident)
            }).send();
        });
        if (Cookie.read("tweetCookie") == "off") {
            $("tweetsOff").fireEvent("click");
        }
        $("cnetRiver").getElement(".riverNavs li.popular").addEvent("click", function () {
            $$("#cnetRiver .riverTools").hide();
        });
        $("cnetRiver").getElement(".riverNavs li.recent").addEvent("click", function () {
            $$("#cnetRiver .riverTools").show();
        });
    });
}