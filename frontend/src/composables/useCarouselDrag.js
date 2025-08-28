import { onMounted, onBeforeUnmount } from "vue";

export function useCarouselDrag(rootRef) {
    let targetEl = null;
    let isDown = false;

    const toTouchLike = (e) => ({
        changedTouches: [{ pageX: e.clientX, pageY: e.clientY }]
    });

    const dispatchTouchLike = (type, e) => {
        const touchLike = toTouchLike(e);
        const evt = new CustomEvent(type, {
            bubbles: true,
            cancelable: true,
            detail: touchLike
        });
        Object.assign(evt, touchLike); // merge field giống TouchEvent
        targetEl.dispatchEvent(evt);
    };

    const onDown = (e) => {
        if (e.button !== 0) return; // chỉ chuột trái
        isDown = true;
        targetEl.style.cursor = "grabbing"; // khi giữ thì grabbing
        dispatchTouchLike("touchstart", e);
    };

    const onMove = (e) => {
        if (!isDown) return;
        e.preventDefault(); // ngăn chọn text khi kéo
        dispatchTouchLike("touchmove", e);
    };

    const onUp = (e) => {
        if (!isDown) return;
        isDown = false;
        targetEl.style.cursor = "grab"; // khi thả chuột về grab
        dispatchTouchLike("touchend", e);
    };

    onMounted(() => {
        const root = rootRef.value?.$el ?? rootRef.value;
        if (!root) return;
        targetEl = root.querySelector(".p-carousel-items-container");
        if (!targetEl) return;

        // set mặc định
        targetEl.style.cursor = "grab";
        targetEl.style.userSelect = "none";

        targetEl.addEventListener("mousedown", onDown, { passive: false });
        window.addEventListener("mousemove", onMove, { passive: false });
        window.addEventListener("mouseup", onUp, { passive: true });

        // ngăn drag ảnh mặc định
        targetEl.querySelectorAll("img").forEach((img) => {
            img.addEventListener("dragstart", (e) => e.preventDefault());
        });
    });

    onBeforeUnmount(() => {
        if (!targetEl) return;
        targetEl.removeEventListener("mousedown", onDown);
        window.removeEventListener("mousemove", onMove);
        window.removeEventListener("mouseup", onUp);
    });
}
