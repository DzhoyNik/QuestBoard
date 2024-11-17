export function viewActions() {
    const headerActions = document.getElementsByClassName("header-actions")[0];
    const btnSetting = headerActions.getElementsByTagName("button")[0];
    const btnLogout = headerActions.getElementsByTagName("button")[1];

    const onViewBtnSetting = [
        { transform: "translateY(-3rem) translateX(-2rem) scale(0)" },
        { transform: "translateY(0rem) translateX(0rem) scale(1)" },
    ]

    const onViewBtnLogout = [
        { transform: "translateY(-3rem) translateX(2rem) scale(0)" },
        { transform: "translateY(0rem) translateX(0rem) scale(1)" },
    ]

    const onCloseBtnSetting = [
        { transform: "translateY(0rem) translateX(0rem) scale(1)" },
        { transform: "translateY(-3rem) translateX(-2rem) scale(0)" },
    ]

    const onCloseBtnLogout = [
        { transform: "translateY(0rem) translateX(0rem) scale(1)" },
        { transform: "translateY(-3rem) translateX(2rem) scale(0)" },
    ]

    const timing = {
        duration: 500,
        iteration: 1
    }

    if (headerActions.style.display == "" || headerActions.style.display == "none") {
        headerActions.style.display = "flex";
        btnSetting.animate(onViewBtnSetting, timing);
        btnLogout.animate(onViewBtnLogout, timing);
    } else {
        btnSetting.animate(onCloseBtnSetting, timing);
        btnLogout.animate(onCloseBtnLogout, timing);
        setTimeout(() => headerActions.style.display = "none", 250);
    }
}