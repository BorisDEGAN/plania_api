import GeminiService from '#services/gemini'
import type { HttpContext } from '@adonisjs/core/http'

export default class TestsController {
  async test({ request }: HttpContext) {
    const gemini = new GeminiService()

    return await gemini.generate(request.input('prompt'))
  }
}
