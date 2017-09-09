module.exports = async function($) {
    let callback = new require('./callback')($, "SECRET_HERE", "ACCESS_TOKEN");

    let admin = 6629276;
    let help =
        "!купить [количество_биткоинов] - купить битконы\r\n" +
        "!продать [количество_биткоинов] - продать биткоины\r\n" +
        "!инфо покупка - информация как купить биткоины\r\n" +
        "!инфо продажа - информация как продать биткоины\r\n" +
        "!курс покупка - текущая цена покупки 1 биткоина в гривнах\r\n" +
        "!курс продажа - текущая цена продажи 1 биткоина в гривнах\r\n" +
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
