import dayjs from 'dayjs'
import relativeTime from 'dayjs/plugin/relativeTime'
import utc from 'dayjs/plugin/utc'
import timezone from 'dayjs/plugin/timezone'
import ko from 'dayjs/locale/ko'

dayjs.extend(relativeTime)
dayjs.extend(utc)
dayjs.extend(timezone)
dayjs.locale(ko)

dayjs.tz.setDefault('Asia/Seoul')

export default (el) => {
    let datetime = el.getAttribute('datetime')

    if (!datetime) {
        return
    }

    const setHumanTime = () => {
        el.innerText = dayjs().tz().to(dayjs.tz(datetime))
    }

    setHumanTime()
    setInterval(setHumanTime, 30000)
}