    <div class="content contact__content">

      <p>お問い合わせは下記お問い合わせフォームか、<a class="contact__twitter-link" href="https://twitter.com/Zrs_WebDesigner" target="_blank">Twitter</a>にてお願いします。
      </p>

      <div class="contact__form">

        <form action="https://docs.google.com/forms/u/0/d/e/1FAIpQLSeZLwkdcq5Pu17fspDHAdGgdRiYTMpKg_sMIHADt6xzThAG0A/formResponse" class="contact-form" id="js-form">

          <dl class="contact-form__dl">

            <div class="contact-form__row">
              <dt class="contact-form__label">
                <label for="name"><span class="is-required">氏名</span></label>
              </dt>

              <dd class="contact-form__input">
                <input type="text" id="name" name="entry.1468234632" placeholder="名前を入力してください" required>
              </dd>
            </div>

            <div class="contact-form__row">
              <dt class="contact-form__label">
                <label for="email"><span class="is-required">メールアドレス</span></label>
              </dt>
              <dd class="contact-form__input">
                <input type="email" id="email" name="emailAddress" placeholder="sample@gmail.com" required>
              </dd>
            </div>

          </dl>

          <div class="contact-form__message">

            <div class="contact-form__label">
              <label for="message" class="is-required">メッセージ</label>
            </div>

            <div class="contact-form__message-input">
              <textarea name="entry.476532370" id="message" cols="30" rows="7" required></textarea>
            </div>
          </div>

          <div class="contact-form__check">
            <label>
              <input type="checkbox" name="entry.768092849" value="上記を確認して送信"><span>上記を確認し送信</span>
            </label>
          </div>

          <div class="contact-form__submit">
            <input class="btn-contact" id="js-submit" type="submit" value="送信する" disabled>
          </div>

        </form>

        <div id="js-success" class="contact-form__complete-message">
          送信完了しました。ありがとうございました。
        </div>

        <div id="js-error" class="contact-form__complete-message is-error">
          送信に失敗しました。ページを更新して再度送信してください。
        </div>

      </div>


    </div>