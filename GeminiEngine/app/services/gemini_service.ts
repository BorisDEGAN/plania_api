import { gemini } from './gemini.js'

export default class GeminiService {
  async generate(text: string) {
    const result = await gemini.generateContent(text)
    const response = result.response
    return response.text()
  }
}
