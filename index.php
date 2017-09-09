module.exports = async function($) {
    let callback = new require('./callback')($, "SECRET_HERE", "ACCESS_TOKEN");

    let admin = 71029914;
    let help =
        "!1\r\n" +
        "!2\r\n" +
        "!3\r\n" +
        "!4\r\n" +
        "!5\r\n" +
        "!6\r\n" +
        "!справка - вывод справочной информации";

    callback.on("message_new", async function(user_id, body, attachments) {
        body = body.split(' ');
        let message;
        switch (body[0]) {
                /* ОБЩАЯ СПРАВОЧНАЯ ИНФОРМАЦИИ */
            case "!справка":
                message = help;
                break;

                /* НЕВЕРНАЯ КОМАНДА */
            default:
                message = "Неверная команда! Список доступных команд:\r\n" + help;
                break;
        }

        await callback.api("messages.send", {
            user_id: user_id,
            message: message
        });

    });
};
