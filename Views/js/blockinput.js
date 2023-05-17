function blockInput() {
    if (consUsername.value.length > 0) {
      entrUsername.disabled = true;
      entrPassword.disabled = true;
      entrBtn.disabled = true;
    } else {
      entrUsername.disabled = false;
      entrPassword.disabled = false;
      entrBtn.disabled = false;
    }

    if (entrUsername.value.length > 0) {
      consUsername.disabled = true;
      consPassword.disabled = true;
      consBtn.disabled = true;
    } else {
      consUsername.disabled = false;
      consPassword.disabled = false;
      consBtn.disabled = false;
    }
  }